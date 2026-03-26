<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pay Monthly Fee — Mukusho Karate Kenya</title>
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

    @include('partials.navbar')

    {{-- Main Content --}}
    <div class="max-w-2xl mx-auto px-4 py-10" x-data="{ selectedType: '' }" x-cloak>

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-4">
                <span class="w-2 h-2 bg-red-600 rounded-full mr-2 animate-pulse"></span>
                Existing Members
            </div>
            <h1 class="font-display text-3xl md:text-4xl font-bold text-slate-900 uppercase">Pay Monthly Fee</h1>
            <p class="text-slate-600 mt-2">Select who the payment is for, then fill in the details below.</p>
        </div>

        {{-- ═══ Radio Category Selector ═══ --}}
        <div class="mb-10">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <label class="block text-sm font-bold text-slate-700 mb-4 uppercase tracking-wide">
                    Paying Monthly Fee For <span class="text-red-500">*</span>
                </label>
                <div class="flex flex-col sm:flex-row gap-4">
                    {{-- Child Radio --}}
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="pay_type" value="child" x-model="selectedType" class="sr-only peer">
                        <div class="border-2 rounded-xl p-5 flex items-center gap-4 transition-all hover:border-amber-300"
                             :class="selectedType === 'child' ? 'border-amber-500 bg-amber-50 ring-2 ring-amber-500/20' : 'border-slate-200'">
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="selectedType === 'child' ? 'border-amber-500 bg-amber-500' : 'border-slate-300'">
                                <div class="w-2 h-2 rounded-full bg-white" x-show="selectedType === 'child'"></div>
                            </div>
                            <div>
                                <div class="font-display font-bold text-slate-900 uppercase text-sm">Child (Kid)</div>
                                <div class="text-xs text-slate-500 mt-0.5">Pay for a registered child member</div>
                            </div>
                        </div>
                    </label>

                    {{-- Adult Radio --}}
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="pay_type" value="adult" x-model="selectedType" class="sr-only peer">
                        <div class="border-2 rounded-xl p-5 flex items-center gap-4 transition-all hover:border-red-300"
                             :class="selectedType === 'adult' ? 'border-red-600 bg-red-50 ring-2 ring-red-600/20' : 'border-slate-200'">
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="selectedType === 'adult' ? 'border-red-600 bg-red-600' : 'border-slate-300'">
                                <div class="w-2 h-2 rounded-full bg-white" x-show="selectedType === 'adult'"></div>
                            </div>
                            <div>
                                <div class="font-display font-bold text-slate-900 uppercase text-sm">Adult</div>
                                <div class="text-xs text-slate-500 mt-0.5">Pay for yourself as an adult member</div>
                            </div>
                        </div>
                    </label>
                </div>

                <p class="text-xs text-slate-400 mt-3 text-center">Not yet registered? <a href="{{ route('register.create') }}" class="text-red-700 font-semibold hover:underline">Register as a new member here</a></p>
            </div>
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

        {{-- ═══════════════════════════════════════════════════ --}}
        {{-- CHILD PAYMENT FORM                                 --}}
        {{-- ═══════════════════════════════════════════════════ --}}
        <div x-show="selectedType === 'child'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <form action="{{ route('payment.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-6">
                @csrf
                <input type="hidden" name="payment_for" value="child">

                <h3 class="font-display text-lg font-bold text-slate-900 uppercase flex items-center gap-2">
                    <span class="w-7 h-7 bg-amber-400 text-amber-900 rounded-full flex items-center justify-center text-xs font-bold">🧒</span>
                    Child Monthly Fee
                </h3>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Guardian / Parent Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Email used during registration">
                    <p class="text-xs text-slate-500 mt-1">Enter the guardian's email used when registering the child.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Child's Full Name <span class="text-red-500">*</span></label>
                    <input type="text" name="child_name" value="{{ old('child_name') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Enter child's registered full name">
                    <p class="text-xs text-slate-500 mt-1">Must match the name used during registration.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Payment For Month <span class="text-red-500">*</span></label>
                    <select name="month_for" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                        @php
                            $months = [];
                            for ($i = 0; $i < 6; $i++) {
                                $date = now()->addMonths($i);
                                $months[] = $date->format('F Y');
                            }
                        @endphp
                        @foreach($months as $month)
                            <option value="{{ $month }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Amount (KSH) <span class="text-red-500">*</span></label>
                    <input type="number" name="amount" value="{{ old('amount', 1000) }}" required min="100" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="1000">
                </div>

                {{-- M-Pesa --}}
                <div class="bg-red-50 border border-red-200 rounded-xl p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        <div>
                            <div class="font-bold text-red-800">M-Pesa Lipa Na M-Pesa</div>
                            <div class="text-sm text-red-700">An STK push will be sent to your phone.</div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">M-Pesa Phone Number <span class="text-red-500">*</span></label>
                        <input type="tel" name="mpesa_phone" value="{{ old('mpesa_phone') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="07XX XXX XXX">
                    </div>
                </div>

                <button type="submit" style="display:block;width:100%;background:#f59e0b;color:#ffffff;font-weight:700;padding:16px;border-radius:8px;text-transform:uppercase;letter-spacing:0.05em;font-size:14px;font-family:'Oswald',sans-serif;border:none;cursor:pointer;transition:all 0.2s;" onmouseover="this.style.background='#fbbf24';this.style.boxShadow='0 10px 25px rgba(245,158,11,0.3)'" onmouseout="this.style.background='#f59e0b';this.style.boxShadow='none'">
                    Pay Child's Monthly Fee via M-Pesa &rarr;
                </button>
            </form>
        </div>

        {{-- ═══════════════════════════════════════════════════ --}}
        {{-- ADULT PAYMENT FORM                                 --}}
        {{-- ═══════════════════════════════════════════════════ --}}
        <div x-show="selectedType === 'adult'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <form action="{{ route('payment.store') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-6">
                @csrf
                <input type="hidden" name="payment_for" value="adult">

                <h3 class="font-display text-lg font-bold text-slate-900 uppercase flex items-center gap-2">
                    <span class="w-7 h-7 bg-red-700 text-white rounded-full flex items-center justify-center text-xs font-bold">🥋</span>
                    Adult Monthly Fee
                </h3>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Your Registered Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Your registered email address">
                    <p class="text-xs text-slate-500 mt-1">Use the email you registered with.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Payment For Month <span class="text-red-500">*</span></label>
                    <select name="month_for" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                        @php
                            $months = [];
                            for ($i = 0; $i < 6; $i++) {
                                $date = now()->addMonths($i);
                                $months[] = $date->format('F Y');
                            }
                        @endphp
                        @foreach($months as $month)
                            <option value="{{ $month }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Amount (KSH) <span class="text-red-500">*</span></label>
                    <input type="number" name="amount" value="{{ old('amount', 1000) }}" required min="100" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="1000">
                </div>

                {{-- M-Pesa --}}
                <div class="bg-red-50 border border-red-200 rounded-xl p-5">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                        <div>
                            <div class="font-bold text-red-800">M-Pesa Lipa Na M-Pesa</div>
                            <div class="text-sm text-red-700">An STK push will be sent to your phone.</div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">M-Pesa Phone Number <span class="text-red-500">*</span></label>
                        <input type="tel" name="mpesa_phone" value="{{ old('mpesa_phone') }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="07XX XXX XXX">
                    </div>
                </div>

                <button type="submit" style="display:block;width:100%;background:#b91c1c;color:#ffffff;font-weight:700;padding:16px;border-radius:8px;text-transform:uppercase;letter-spacing:0.05em;font-size:14px;font-family:'Oswald',sans-serif;border:none;cursor:pointer;transition:all 0.2s;" onmouseover="this.style.background='#dc2626';this.style.boxShadow='0 10px 25px rgba(185,28,28,0.3)'" onmouseout="this.style.background='#b91c1c';this.style.boxShadow='none'">
                    Pay Monthly Fee via M-Pesa &rarr;
                </button>
            </form>
        </div>

        {{-- Prompt when nothing selected --}}
        <div x-show="!selectedType" class="text-center py-16 text-slate-400">
            <svg class="w-16 h-16 mx-auto mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7l4-4m0 0l4 4m-4-4v18"/></svg>
            <p class="text-lg font-display font-bold uppercase">Select a category above to begin</p>
            <p class="text-sm mt-1">Choose "Child (Kid)" or "Adult" to reveal the payment form.</p>
        </div>

    </div>

    {{-- Alpine JS --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
