<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management — Mukusho Karate Kenya</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-display { font-family: 'Oswald', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

    {{-- Admin Top Nav --}}
    <nav class="bg-slate-900 text-white sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <a href="/" class="flex items-center space-x-2">
                        <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Logo" class="h-9 w-auto rounded-full">
                        <span class="font-display font-bold tracking-wider uppercase text-sm text-white">ADMIN</span>
                    </a>
                    <span class="text-slate-600">|</span>
                    <span class="text-slate-400 text-sm">Welcome, {{ Auth::user()->name }}</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-white text-sm transition-colors">📊 Dashboard</a>
                    @if(Auth::user()->canView('content'))
                    <a href="{{ route('admin.content.index') }}" class="text-amber-400 hover:text-amber-300 text-sm font-semibold transition-colors">📝 Content</a>
                    @endif
                    @if(Auth::user()->canView('users'))
                    <a href="{{ route('admin.users') }}" class="text-green-400 hover:text-green-300 text-sm font-semibold transition-colors">👥 Users</a>
                    @endif
                    <a href="/" class="text-slate-400 hover:text-white text-sm transition-colors">View Site</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-slate-400 hover:text-red-400 text-sm transition-colors">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="font-display text-3xl font-bold text-slate-900 uppercase">User Management</h1>
                <p class="text-slate-500 text-sm mt-1">Manage accounts, approve registrations, assign roles & permissions</p>
            </div>
            @if($currentUser->canEdit('users'))
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 bg-green-700 hover:bg-green-600 text-white font-bold py-2.5 px-5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                Create User
            </a>
            @endif
        </div>

        {{-- Success --}}
        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-6 flex items-center gap-2">
            <svg class="w-5 h-5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ session('success') }}
        </div>
        @endif

        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wide">Total Users</p>
                <p class="text-2xl font-display font-bold text-slate-900 mt-1">{{ $stats['total'] }}</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wide">Approved</p>
                <p class="text-2xl font-display font-bold text-green-600 mt-1">{{ $stats['approved'] }}</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wide">Pending Approval</p>
                <p class="text-2xl font-display font-bold text-amber-600 mt-1">{{ $stats['pending'] }}</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm">
                <p class="text-xs text-slate-500 uppercase tracking-wide">Rejected</p>
                <p class="text-2xl font-display font-bold text-red-600 mt-1">{{ $stats['rejected'] }}</p>
            </div>
        </div>

        {{-- Users Table --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200">
                <h2 class="font-display text-xl font-bold text-slate-900 uppercase">All User Accounts</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">#</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Phone</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Role</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Permissions</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Created</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($users as $user)
                        <tr class="hover:bg-slate-50 transition-colors {{ $user->isPending() ? 'bg-amber-50/50' : '' }}">
                            <td class="px-4 py-3 text-slate-500">{{ $user->id }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">
                                {{ $user->name }}
                                @if($user->id === $currentUser->id)
                                    <span class="text-xs text-green-600 font-bold">(You)</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-slate-600">{{ $user->email }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $user->phone ?? '—' }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $roleColors = [
                                        'super_admin' => 'bg-purple-50 text-purple-700 border-purple-200',
                                        'admin' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'editor' => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'viewer' => 'bg-slate-100 text-slate-600 border-slate-200',
                                    ];
                                @endphp
                                <span class="inline-block {{ $roleColors[$user->role] ?? 'bg-slate-100 text-slate-600' }} text-xs font-bold px-2.5 py-1 rounded-full uppercase border">
                                    {{ $user->role_label }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $statusColors = [
                                        'approved' => 'bg-green-50 text-green-700',
                                        'pending' => 'bg-amber-50 text-amber-700',
                                        'rejected' => 'bg-red-50 text-red-700',
                                    ];
                                @endphp
                                <span class="inline-block {{ $statusColors[$user->status] ?? 'bg-slate-100 text-slate-600' }} text-xs font-bold px-2.5 py-1 rounded-full uppercase">
                                    {{ $user->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @php $perms = $user->permissions ?? []; @endphp
                                <div class="flex flex-wrap gap-1">
                                    @foreach(\App\Models\User::PERMISSION_MODULES as $key => $label)
                                        @if(!empty($perms[$key]['view']) || !empty($perms[$key]['edit']))
                                            <span class="inline-block text-[10px] font-bold px-1.5 py-0.5 rounded {{ !empty($perms[$key]['edit']) ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500' }}" title="{{ $label }}: {{ !empty($perms[$key]['edit']) ? 'View+Edit' : 'View only' }}">
                                                {{ ucfirst(substr($key, 0, 3)) }}{{ !empty($perms[$key]['edit']) ? '✎' : '👁' }}
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-4 py-3 text-slate-500 text-xs">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-1.5">
                                    {{-- Quick Approve/Reject for pending --}}
                                    @if($user->isPending() && $currentUser->canEdit('users'))
                                        <form action="{{ route('admin.users.approve', $user) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-green-600 hover:bg-green-500 text-white text-xs font-bold px-2.5 py-1.5 rounded-lg transition-all" title="Approve">✓ Approve</button>
                                        </form>
                                        <form action="{{ route('admin.users.reject', $user) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-red-600 hover:bg-red-500 text-white text-xs font-bold px-2.5 py-1.5 rounded-lg transition-all" title="Reject">✗ Reject</button>
                                        </form>
                                    @endif

                                    {{-- Edit --}}
                                    @if($currentUser->canEdit('users'))
                                        <a href="{{ route('admin.users.edit', $user) }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 text-xs font-bold px-2.5 py-1.5 rounded-lg transition-all" title="Edit">✎ Edit</a>
                                    @endif

                                    {{-- Delete (super_admin only, not yourself) --}}
                                    @if($currentUser->isSuperAdmin() && $user->id !== $currentUser->id)
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete user {{ $user->name }}? This cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 text-xs font-bold px-2.5 py-1.5 rounded-lg transition-all" title="Delete">🗑</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="px-4 py-12 text-center text-slate-400">
                                <div class="text-4xl mb-2">👥</div>
                                No users found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
