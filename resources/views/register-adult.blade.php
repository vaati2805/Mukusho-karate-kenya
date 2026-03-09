<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register as Adult — Mukusho Karate Kenya</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Oswald', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

    {{-- Top Bar --}}
    <div class="bg-green-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="flex items-center space-x-3">
                    <img src="{{ asset('images/mukusho-logo.jpeg') }}" alt="Mukusho Karate Kenya Logo" class="h-10 w-auto rounded-full shadow">
                    <div class="font-display font-bold tracking-wider uppercase text-sm">
                        <span class="text-white">MUKUSHO</span>
                        <span class="text-amber-400 text-xs ml-1">KARATE KENYA</span>
                    </div>
                </a>
                <a href="{{ route('register.create') }}" class="text-green-200 hover:text-white text-sm transition-colors flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Change Type
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto px-4 py-12">
        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center bg-green-50 text-green-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-4">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Adult Registration
            </div>
            <h1 class="font-display text-4xl font-bold text-slate-900 uppercase">Register as an Adult</h1>
            <p class="text-slate-600 mt-2">Registration fee: <strong class="text-green-700">KSH 1,000</strong> (one-time, via M-Pesa)</p>
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

        {{-- Form --}}
        <form action="{{ route('register.adult.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-6">
            @csrf

            {{-- Personal Info --}}
            <div>
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-700 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                    Personal Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="Enter your full name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="you@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="+254 7XX XXX XXX">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Gender</label>
                        <select name="gender" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                            <option value="">Select gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Date of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Location / Area</label>
                        <input type="text" name="location" value="{{ old('location') }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="e.g. Nyeri Town">
                    </div>
                    {{-- Optional Profile Photo --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-1">Profile Photo <span class="text-slate-400 font-normal">(Optional)</span></label>
                        <input type="file" name="image" accept="image/*" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                        <p class="text-xs text-slate-500 mt-1">Max 3MB. Accepted formats: JPG, PNG, WEBP.</p>
                    </div>
                </div>
            </div>

            {{-- Training --}}
            <div>
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-700 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                    Training Program
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Select Program <span class="text-red-500">*</span></label>
                        <select name="program" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                            <option value="">Choose a program</option>
                            <option value="teens-adults" {{ old('program') == 'teens-adults' ? 'selected' : '' }}>Teens & Adults (Ages 13+)</option>
                            <option value="competition" {{ old('program') == 'competition' ? 'selected' : '' }}>Elite Competition (Advanced)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Preferred Club / Dojo <span class="text-red-500">*</span></label>
                        <select name="club" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm">
                            <option value="">Select a club</option>
                            <option value="Nyeri Main Dojo" {{ old('club') == 'Nyeri Main Dojo' ? 'selected' : '' }}>Nyeri Main Dojo — Nyeri County</option>
                            <option value="Nanyuki Sports Club" {{ old('club') == 'Nanyuki Sports Club' ? 'selected' : '' }}>Nanyuki Sports Club — Laikipia County</option>
                            <option value="Murang'a Town Dojo" {{ old('club') == "Murang'a Town Dojo" ? 'selected' : '' }}>Murang'a Town Dojo — Murang'a County</option>
                            <option value="Karatina University Club" {{ old('club') == 'Karatina University Club' ? 'selected' : '' }}>Karatina University Club — Nyeri County</option>
                            <option value="Othaya Youth Karate" {{ old('club') == 'Othaya Youth Karate' ? 'selected' : '' }}>Othaya Youth Karate — Nyeri County</option>
                            <option value="Sagana Martial Arts" {{ old('club') == 'Sagana Martial Arts' ? 'selected' : '' }}>Sagana Martial Arts — Kirinyaga County</option>
                            <option value="Kenol Defenders Dojo" {{ old('club') == 'Kenol Defenders Dojo' ? 'selected' : '' }}>Kenol Defenders Dojo — Murang'a County</option>
                            <option value="Mukuyu Kids Club" {{ old('club') == 'Mukuyu Kids Club' ? 'selected' : '' }}>Mukuyu Kids Club — Murang'a County</option>
                        </select>
                    </div>
                </div>
            </div>

            {{-- Emergency Contact --}}
            <div>
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-700 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                    Emergency Contact
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Contact Name</label>
                        <input type="text" name="emergency_contact" value="{{ old('emergency_contact') }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="Emergency contact name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Contact Phone</label>
                        <input type="tel" name="emergency_phone" value="{{ old('emergency_phone') }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="+254 7XX XXX XXX">
                    </div>
                </div>
            </div>

            {{-- Payment --}}
            <div>
                <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                    <span class="w-7 h-7 bg-green-600 text-white rounded-full flex items-center justify-center text-xs font-bold">4</span>
                    M-Pesa Payment
                </h3>
                <div class="bg-green-50 border border-green-200 rounded-xl p-5 mb-4">
                    <div class="flex items-center gap-3 mb-2">
                        <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        <div>
                            <div class="font-bold text-green-800">M-Pesa Lipa Na M-Pesa</div>
                            <div class="text-sm text-green-700">A prompt will be sent to your phone. Enter your M-Pesa PIN to complete payment.</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg p-3 mt-3 flex items-center justify-between">
                        <span class="text-slate-600 text-sm">Registration Fee</span>
                        <span class="font-display font-bold text-xl text-green-700">KSH 1,000</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">M-Pesa Phone Number <span class="text-red-500">*</span></label>
                    <input type="tel" name="mpesa_phone" value="{{ old('mpesa_phone') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-green-500 focus:ring-2 focus:ring-green-500/20 outline-none transition text-sm" placeholder="07XX XXX XXX">
                    <p class="text-xs text-slate-500 mt-1">Enter the phone number registered with M-Pesa. An STK push will be sent.</p>
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button type="submit" class="w-full bg-green-700 hover:bg-green-600 text-white font-bold py-4 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display">
                    Register & Pay KSH 1,000 via M-Pesa &rarr;
                </button>
                <p class="text-xs text-slate-500 text-center mt-3">By registering, you agree to abide by the Mukusho Karate Kenya code of conduct.</p>
            </div>
        </form>
    </div>

</body>
</html>
