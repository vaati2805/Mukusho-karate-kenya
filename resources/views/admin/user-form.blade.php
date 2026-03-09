<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user ? 'Edit User' : 'Create User' }} — Mukusho Karate Kenya</title>
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
<body class="bg-slate-100 min-h-screen" x-data="{ showPass: false }">

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
                    <span class="text-slate-400 text-sm">{{ $user ? 'Edit User' : 'Create User' }}</span>
                </div>
                <a href="{{ route('admin.users') }}" class="text-slate-400 hover:text-white text-sm transition-colors">&larr; Back to Users</a>
            </div>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto px-4 py-10">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="font-display text-3xl font-bold text-slate-900 uppercase">
                {{ $user ? 'Edit User: ' . $user->name : 'Create New User' }}
            </h1>
            <p class="text-slate-500 text-sm mt-1">
                {{ $user ? 'Update this user\'s details, role, and permissions.' : 'Create a new user account with specific role and permissions. Account will be auto-approved.' }}
            </p>
        </div>

        {{-- Errors --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6">
            <div class="font-bold mb-1">Please fix the following:</div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ $user ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf
            @if($user) @method('PUT') @endif

            {{-- Basic Info --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5">
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-700 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                    Account Details
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $user?->name) }}" required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm"
                            placeholder="Enter full name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $user?->email) }}" required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm"
                            placeholder="you@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
                        <input type="tel" name="phone" value="{{ old('phone', $user?->phone) }}"
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm"
                            placeholder="+254 7XX XXX XXX">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1">
                            Password {{ $user ? '(leave blank to keep current)' : '' }} <span class="{{ $user ? 'hidden' : '' }} text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input :type="showPass ? 'text' : 'password'" name="password" {{ $user ? '' : 'required' }}
                                class="w-full px-4 py-3 pr-12 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm"
                                placeholder="{{ $user ? 'Leave blank to keep unchanged' : 'Create a password' }}">
                            <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-700 transition-colors">
                                <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                <svg x-show="showPass" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Role & Status --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5">
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-700 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                    Role & Status
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Role <span class="text-red-500">*</span></label>
                        <select name="role" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                            @foreach(\App\Models\User::ROLES as $value => $label)
                                @if($value !== 'super_admin' || $currentUser->isSuperAdmin())
                                <option value="{{ $value }}" {{ old('role', $user?->role) === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                                @endif
                            @endforeach
                        </select>
                        <p class="text-xs text-slate-400 mt-1">
                            <strong>Super Admin</strong> = full access &middot;
                            <strong>Admin</strong> = manage all except users &middot;
                            <strong>Editor</strong> = edit content &middot;
                            <strong>Viewer</strong> = read only
                        </p>
                    </div>
                    @if($user)
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Status <span class="text-red-500">*</span></label>
                        <select name="status" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                            <option value="approved" {{ old('status', $user->status) === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pending" {{ old('status', $user->status) === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="rejected" {{ old('status', $user->status) === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Permissions --}}
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 space-y-5">
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-700 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                    Permissions
                </h3>
                <p class="text-sm text-slate-500">Choose what this user can view and edit. Super Admins always have full access regardless of these checkboxes.</p>

                @php
                    $existingPerms = old('permissions') ?? ($user ? $user->permissions : \App\Models\User::defaultPermissions('viewer'));
                @endphp

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="px-4 py-3 text-left font-semibold text-slate-700">Module</th>
                                <th class="px-4 py-3 text-center font-semibold text-slate-700">Can View</th>
                                <th class="px-4 py-3 text-center font-semibold text-slate-700">Can Edit</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach(\App\Models\User::PERMISSION_MODULES as $key => $label)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-slate-900">
                                    {{ $label }}
                                    @if($key === 'users')
                                        <span class="text-xs text-slate-400">(Super Admin / Admin only)</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <input type="hidden" name="perm_{{ $key }}_view" value="0">
                                    <input type="checkbox" name="perm_{{ $key }}_view" value="1"
                                        {{ !empty($existingPerms[$key]['view']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 border-slate-300 rounded focus:ring-green-500">
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <input type="hidden" name="perm_{{ $key }}_edit" value="0">
                                    <input type="checkbox" name="perm_{{ $key }}_edit" value="1"
                                        {{ !empty($existingPerms[$key]['edit']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 border-slate-300 rounded focus:ring-green-500">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="bg-green-700 hover:bg-green-600 text-white font-bold py-3.5 px-8 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display">
                    {{ $user ? 'Update User' : 'Create User' }} &rarr;
                </button>
                <a href="{{ route('admin.users') }}" class="text-slate-500 hover:text-slate-700 text-sm transition-colors">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
