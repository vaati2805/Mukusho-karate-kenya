<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Models\SiteContent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sections = [];
    foreach (SiteContent::sections() as $key => $label) {
        $sections[$key] = SiteContent::forSection($key);
    }
    return view('welcome', compact('sections'));
});

// Free Trial Request
Route::post('/free-trial', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'name'    => 'required|string|max:100',
        'phone'   => 'required|string|max:20',
        'program' => 'nullable|string|max:50',
        'message' => 'nullable|string|max:500',
    ]);

    \App\Models\TrialRequest::create([
        'name'    => $request->name,
        'phone'   => $request->phone,
        'program' => $request->program,
        'message' => $request->message,
    ]);

    return redirect('/#contact')->with('trial_success', 'Your free trial request has been submitted! We\'ll contact you shortly.');
})->name('free.trial.store');

// Registration - Type Chooser
Route::get('/register', [MemberController::class, 'create'])->name('register.create');

// Kid Registration
Route::get('/register/kid', [MemberController::class, 'kidForm'])->name('register.kid');
Route::post('/register/kid', [MemberController::class, 'storeKids'])->name('register.kid.store');

// Adult Registration
Route::get('/register/adult', [MemberController::class, 'adultForm'])->name('register.adult');
Route::post('/register/adult', [MemberController::class, 'storeAdult'])->name('register.adult.store');

Route::get('/register/success', [MemberController::class, 'success'])->name('register.success');

// Monthly Payment
Route::get('/pay-monthly', [PaymentController::class, 'create'])->name('payment.create');
Route::post('/pay-monthly', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/pay-monthly/success', [PaymentController::class, 'success'])->name('payment.success');

// Admin Auth
Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'registerForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');

// Admin Dashboard (protected)
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // CMS Content Management
    Route::get('/admin/content', [AdminContentController::class, 'index'])->name('admin.content.index');
    Route::get('/admin/content/create', [AdminContentController::class, 'create'])->name('admin.content.create');
    Route::post('/admin/content', [AdminContentController::class, 'store'])->name('admin.content.store');
    Route::get('/admin/content/{content}/edit', [AdminContentController::class, 'edit'])->name('admin.content.edit');
    Route::put('/admin/content/{content}', [AdminContentController::class, 'update'])->name('admin.content.update');
    Route::post('/admin/content/{content}/archive', [AdminContentController::class, 'archive'])->name('admin.content.archive');
    Route::post('/admin/content/{content}/restore', [AdminContentController::class, 'restore'])->name('admin.content.restore');
    Route::delete('/admin/content/{content}', [AdminContentController::class, 'destroy'])->name('admin.content.destroy');
    Route::delete('/admin/content/media/{media}', [AdminContentController::class, 'deleteMedia'])->name('admin.content.media.delete');

    // User Management
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::post('/admin/users/{user}/approve', [AdminController::class, 'approveUser'])->name('admin.users.approve');
    Route::post('/admin/users/{user}/reject', [AdminController::class, 'rejectUser'])->name('admin.users.reject');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    // Exports
    Route::get('/admin/export/members/csv', [AdminController::class, 'exportMembersCsv'])->name('admin.export.members.csv');
    Route::get('/admin/export/members/xls', [AdminController::class, 'exportMembersXls'])->name('admin.export.members.xls');
    Route::get('/admin/export/members/pdf', [AdminController::class, 'exportMembersPdf'])->name('admin.export.members.pdf');
    Route::get('/admin/export/payments/csv', [AdminController::class, 'exportPaymentsCsv'])->name('admin.export.payments.csv');
    Route::get('/admin/export/payments/xls', [AdminController::class, 'exportPaymentsXls'])->name('admin.export.payments.xls');
    Route::get('/admin/export/payments/pdf', [AdminController::class, 'exportPaymentsPdf'])->name('admin.export.payments.pdf');
});
