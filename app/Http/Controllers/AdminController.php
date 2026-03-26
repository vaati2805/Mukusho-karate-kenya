<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    /**
     * Show admin login form.
     */
    public function loginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle admin login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Check if the account is approved
            if (!$user->isApproved()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                if ($user->isPending()) {
                    return back()->withErrors([
                        'email' => 'Your account is pending approval. Please wait for a Super Admin to approve your access.',
                    ])->onlyInput('email');
                }

                return back()->withErrors([
                    'email' => 'Your account has been rejected. Please contact the administrator.',
                ])->onlyInput('email');
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show account registration form.
     */
    public function registerForm()
    {
        return view('admin.register');
    }

    /**
     * Handle account registration.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => $validated['password'], // Will be hashed by the cast
            'role' => User::ROLE_VIEWER,
            'status' => 'pending',
            'permissions' => User::defaultPermissions(User::ROLE_VIEWER),
        ]);

        // Notify admin about new pending account
        try {
            Mail::raw(
                "New admin account registration pending approval:\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: " . ($validated['phone'] ?? 'N/A') . "\n\n" .
                "Log in to the admin panel to approve or reject this account.",
                function ($message) use ($validated) {
                    $message->to(config('app.admin_email'))
                            ->subject('🔔 New Admin Account Pending — ' . $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::warning('Admin registration notification email failed: ' . $e->getMessage());
        }

        return redirect()->route('admin.register.form')
            ->with('success', 'Account created successfully! Please wait for a Super Admin to approve your account before you can access the admin panel.');
    }

    /**
     * Admin dashboard showing members and payments.
     */
    public function dashboard(Request $request)
    {
        $user = Auth::user();

        // Unapproved users get redirected to the public website
        if (!$user->isApproved()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('info', 'Your account is not yet approved. Please contact the administrator.');
        }

        $tab = $request->get('tab', 'members');

        $members = Member::withCount('payments')
            ->orderBy('created_at', 'desc')
            ->get();

        $payments = Payment::with('member')
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate stats
        $stats = [
            'total_members' => Member::count(),
            'active_members' => Member::where('status', 'active')->count(),
            'total_revenue' => Payment::where('status', 'completed')->sum('amount'),
            'monthly_payments' => Payment::where('payment_type', 'monthly')
                ->where('status', 'completed')
                ->count(),
        ];

        return view('admin.dashboard', compact('members', 'payments', 'stats', 'tab'));
    }

    /**
     * Export members as CSV.
     */
    public function exportMembersCsv()
    {
        if (!Auth::user()->canView('members')) {
            abort(403, 'You do not have permission to export member data.');
        }

        $members = Member::all();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="members_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($members) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Full Name', 'Email', 'Phone', 'Gender', 'DOB', 'Program', 'Belt Rank', 'Membership Paid', 'Status', 'Registered On']);

            foreach ($members as $member) {
                fputcsv($file, [
                    $member->id,
                    $member->full_name,
                    $member->email,
                    $member->phone,
                    $member->gender ?? 'N/A',
                    $member->date_of_birth ? $member->date_of_birth->format('Y-m-d') : 'N/A',
                    $member->program,
                    $member->belt_rank,
                    $member->membership_paid ? 'Yes' : 'No',
                    $member->status,
                    $member->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Export payments as CSV.
     */
    public function exportPaymentsCsv()
    {
        if (!Auth::user()->canView('payments')) {
            abort(403, 'You do not have permission to export payment data.');
        }

        $payments = Payment::with('member')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="payments_' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($payments) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Member Name', 'Email', 'Amount (KSH)', 'Type', 'M-Pesa Receipt', 'M-Pesa Phone', 'Month For', 'Status', 'Date']);

            foreach ($payments as $payment) {
                fputcsv($file, [
                    $payment->id,
                    $payment->member->full_name ?? 'N/A',
                    $payment->member->email ?? 'N/A',
                    $payment->amount,
                    ucfirst($payment->payment_type),
                    $payment->mpesa_receipt ?? 'N/A',
                    $payment->mpesa_phone ?? 'N/A',
                    $payment->month_for ?? 'N/A',
                    ucfirst($payment->status),
                    $payment->transaction_date ? $payment->transaction_date->format('Y-m-d H:i') : $payment->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    /**
     * Export members as XLS (Excel-compatible HTML table).
     */
    public function exportMembersXls()
    {
        if (!Auth::user()->canView('members')) {
            abort(403, 'You do not have permission to export member data.');
        }

        $members = Member::all();

        $html = '<table border="1">';
        $html .= '<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Phone</th><th>Gender</th><th>DOB</th><th>Program</th><th>Belt Rank</th><th>Membership Paid</th><th>Status</th><th>Registered On</th></tr>';

        foreach ($members as $member) {
            $html .= '<tr>';
            $html .= '<td>' . $member->id . '</td>';
            $html .= '<td>' . e($member->full_name) . '</td>';
            $html .= '<td>' . e($member->email) . '</td>';
            $html .= '<td>' . e($member->phone) . '</td>';
            $html .= '<td>' . e($member->gender ?? 'N/A') . '</td>';
            $html .= '<td>' . ($member->date_of_birth ? $member->date_of_birth->format('Y-m-d') : 'N/A') . '</td>';
            $html .= '<td>' . e($member->program) . '</td>';
            $html .= '<td>' . e($member->belt_rank) . '</td>';
            $html .= '<td>' . ($member->membership_paid ? 'Yes' : 'No') . '</td>';
            $html .= '<td>' . e($member->status) . '</td>';
            $html .= '<td>' . $member->created_at->format('Y-m-d H:i') . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        return Response::make($html, 200, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="members_' . date('Y-m-d') . '.xls"',
        ]);
    }

    /**
     * Export payments as XLS (Excel-compatible HTML table).
     */
    public function exportPaymentsXls()
    {
        if (!Auth::user()->canView('payments')) {
            abort(403, 'You do not have permission to export payment data.');
        }

        $payments = Payment::with('member')->get();

        $html = '<table border="1">';
        $html .= '<tr><th>ID</th><th>Member Name</th><th>Email</th><th>Amount (KSH)</th><th>Type</th><th>M-Pesa Receipt</th><th>M-Pesa Phone</th><th>Month For</th><th>Status</th><th>Date</th></tr>';

        foreach ($payments as $payment) {
            $html .= '<tr>';
            $html .= '<td>' . $payment->id . '</td>';
            $html .= '<td>' . e($payment->member->full_name ?? 'N/A') . '</td>';
            $html .= '<td>' . e($payment->member->email ?? 'N/A') . '</td>';
            $html .= '<td>' . $payment->amount . '</td>';
            $html .= '<td>' . ucfirst($payment->payment_type) . '</td>';
            $html .= '<td>' . e($payment->mpesa_receipt ?? 'N/A') . '</td>';
            $html .= '<td>' . e($payment->mpesa_phone ?? 'N/A') . '</td>';
            $html .= '<td>' . e($payment->month_for ?? 'N/A') . '</td>';
            $html .= '<td>' . ucfirst($payment->status) . '</td>';
            $html .= '<td>' . ($payment->transaction_date ? $payment->transaction_date->format('Y-m-d H:i') : $payment->created_at->format('Y-m-d H:i')) . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';

        return Response::make($html, 200, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="payments_' . date('Y-m-d') . '.xls"',
        ]);
    }

    /**
     * Export members as PDF (styled HTML).
     */
    public function exportMembersPdf()
    {
        if (!Auth::user()->canView('members')) {
            abort(403, 'You do not have permission to export member data.');
        }

        $members = Member::all();
        return view('admin.exports.members-pdf', compact('members'));
    }

    /**
     * Export payments as PDF (styled HTML).
     */
    public function exportPaymentsPdf()
    {
        if (!Auth::user()->canView('payments')) {
            abort(403, 'You do not have permission to export payment data.');
        }

        $payments = Payment::with('member')->get();
        return view('admin.exports.payments-pdf', compact('payments'));
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // ═══════════════════════════════════════════
    // USER MANAGEMENT
    // ═══════════════════════════════════════════

    /**
     * Show the user management page.
     */
    public function users(Request $request)
    {
        $currentUser = Auth::user();

        // Only super_admin and admin with users.view permission
        if (!$currentUser->canView('users')) {
            abort(403, 'You do not have permission to manage users.');
        }

        $tab = $request->get('tab', 'all');

        $users = User::orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total' => User::count(),
            'approved' => User::where('status', 'approved')->count(),
            'pending' => User::where('status', 'pending')->count(),
            'rejected' => User::where('status', 'rejected')->count(),
        ];

        return view('admin.users', compact('users', 'stats', 'tab', 'currentUser'));
    }

    /**
     * Show the create user form (admin creates account for someone).
     */
    public function createUser()
    {
        $currentUser = Auth::user();
        if (!$currentUser->canEdit('users')) {
            abort(403, 'You do not have permission to create users.');
        }

        return view('admin.user-form', ['user' => null, 'currentUser' => $currentUser]);
    }

    /**
     * Store a new user created by admin.
     */
    public function storeUser(Request $request)
    {
        $currentUser = Auth::user();
        if (!$currentUser->canEdit('users')) {
            abort(403, 'You do not have permission to create users.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
            'role' => 'required|in:' . implode(',', array_keys(User::ROLES)),
        ]);

        // Don't allow creating super_admin unless you are super_admin
        if ($validated['role'] === User::ROLE_SUPER_ADMIN && !$currentUser->isSuperAdmin()) {
            return back()->withErrors(['role' => 'Only Super Admins can create other Super Admins.'])->withInput();
        }

        // Build permissions from checkboxes
        $permissions = $this->buildPermissionsFromRequest($request);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => $validated['password'],
            'role' => $validated['role'],
            'status' => 'approved', // Admin-created accounts are auto-approved
            'permissions' => $permissions,
        ]);

        return redirect()->route('admin.users')->with('success', 'User account created and approved successfully.');
    }

    /**
     * Show the edit user form.
     */
    public function editUser(User $user)
    {
        $currentUser = Auth::user();
        if (!$currentUser->canEdit('users')) {
            abort(403, 'You do not have permission to edit users.');
        }

        return view('admin.user-form', compact('user', 'currentUser'));
    }

    /**
     * Update user details, role, and permissions.
     */
    public function updateUser(Request $request, User $user)
    {
        $currentUser = Auth::user();
        if (!$currentUser->canEdit('users')) {
            abort(403, 'You do not have permission to edit users.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:' . implode(',', array_keys(User::ROLES)),
            'status' => 'required|in:approved,pending,rejected',
        ]);

        // Don't allow changing to/from super_admin unless you are super_admin
        if (($validated['role'] === User::ROLE_SUPER_ADMIN || $user->role === User::ROLE_SUPER_ADMIN) && !$currentUser->isSuperAdmin()) {
            return back()->withErrors(['role' => 'Only Super Admins can manage Super Admin accounts.'])->withInput();
        }

        // Prevent editing yourself into a non-super_admin if you're the only super_admin
        if ($user->id === $currentUser->id && $currentUser->isSuperAdmin() && $validated['role'] !== User::ROLE_SUPER_ADMIN) {
            $superAdminCount = User::where('role', User::ROLE_SUPER_ADMIN)->count();
            if ($superAdminCount <= 1) {
                return back()->withErrors(['role' => 'Cannot demote yourself — you are the only Super Admin.'])->withInput();
            }
        }

        $permissions = $this->buildPermissionsFromRequest($request);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
            'status' => $validated['status'],
            'permissions' => $permissions,
        ];

        // Optional password change
        if ($request->filled('password')) {
            $request->validate(['password' => 'string|min:6']);
            $updateData['password'] = $request->password;
        }

        $user->update($updateData);

        return redirect()->route('admin.users')->with('success', 'User "' . $user->name . '" updated successfully.');
    }

    /**
     * Approve a pending user.
     */
    public function approveUser(User $user)
    {
        $currentUser = Auth::user();
        if (!$currentUser->canEdit('users')) {
            abort(403);
        }

        $user->update([
            'status' => 'approved',
            'permissions' => $user->permissions ?? User::defaultPermissions($user->role),
        ]);

        return back()->with('success', 'User "' . $user->name . '" has been approved.');
    }

    /**
     * Reject a pending user.
     */
    public function rejectUser(User $user)
    {
        $currentUser = Auth::user();
        if (!$currentUser->canEdit('users')) {
            abort(403);
        }

        $user->update(['status' => 'rejected']);

        return back()->with('success', 'User "' . $user->name . '" has been rejected.');
    }

    /**
     * Delete a user.
     */
    public function destroyUser(User $user)
    {
        $currentUser = Auth::user();
        if (!$currentUser->isSuperAdmin()) {
            abort(403, 'Only Super Admins can delete users.');
        }

        if ($user->id === $currentUser->id) {
            return back()->withErrors(['error' => 'You cannot delete your own account.']);
        }

        $name = $user->name;
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User "' . $name . '" has been deleted.');
    }

    /**
     * Build permissions array from request checkboxes.
     */
    private function buildPermissionsFromRequest(Request $request): array
    {
        $permissions = [];
        foreach (array_keys(User::PERMISSION_MODULES) as $module) {
            $permissions[$module] = [
                'view' => (bool) $request->input("perm_{$module}_view", false),
                'edit' => (bool) $request->input("perm_{$module}_edit", false),
            ];
        }
        return $permissions;
    }
}
