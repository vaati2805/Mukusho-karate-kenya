<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Mukusho Karate Kenya</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Oswald', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full mx-auto px-4">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya Logo" class="h-20 w-auto rounded-full mx-auto mb-4 shadow-lg shadow-green-900/30">
            <h1 class="font-display text-2xl font-bold text-white uppercase tracking-wider">Admin Login</h1>
            <p class="text-slate-400 text-sm mt-1">Mukusho Karate Kenya Management</p>
        </div>

        {{-- Errors --}}
        @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-5 py-3 rounded-xl mb-6 text-sm">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        {{-- Login Form --}}
        <form action="{{ route('admin.login') }}" method="POST" class="bg-slate-800 rounded-2xl border border-slate-700 p-8 space-y-5" x-data="{ showPass: false }">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 rounded-lg bg-slate-700 border border-slate-600 text-white placeholder-slate-400 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm"
                    placeholder="admin@mukushokarate.co.ke">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Password</label>
                <div class="relative">
                    <input :type="showPass ? 'text' : 'password'" name="password" required
                        class="w-full px-4 py-3 pr-12 rounded-lg bg-slate-700 border border-slate-600 text-white placeholder-slate-400 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm"
                        placeholder="••••••••">
                    <button type="button" @click="showPass = !showPass" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-white transition-colors">
                        {{-- Eye open --}}
                        <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        {{-- Eye closed --}}
                        <svg x-show="showPass" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-green-700 hover:bg-green-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display">
                Sign In &rarr;
            </button>
        </form>

        {{-- Create Account Link --}}
        <div class="text-center mt-6 space-y-3">
            <p class="text-slate-500 text-sm">Don't have an account?
                <a href="{{ route('admin.register.form') }}" class="text-green-400 hover:text-green-300 font-semibold transition-colors">Create Account</a>
            </p>
            <a href="/" class="text-slate-500 hover:text-slate-300 text-sm transition-colors">&larr; Back to website</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
