<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register — Mukusho Karate Kenya</title>
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

    @include('partials.navbar')

    {{-- Main Content --}}
    <div class="max-w-6xl mx-auto px-4 py-10" x-data="registerPage()" x-cloak>

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center bg-red-50 text-red-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-4">
                <span class="w-2 h-2 bg-red-600 rounded-full mr-2 animate-pulse"></span>
                New Member Registration
            </div>
            <h1 class="font-display text-3xl md:text-4xl font-bold text-slate-900 uppercase">Register a New Member</h1>
            <p class="text-slate-600 mt-2">Select who is registering, then fill in the details below.</p>
        </div>

        {{-- ═══ Radio Category Selector ═══ --}}
        <div class="max-w-xl mx-auto mb-10">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <label class="block text-sm font-bold text-slate-700 mb-4 uppercase tracking-wide">
                    Register As <span class="text-red-500">*</span>
                </label>
                <div class="flex flex-col sm:flex-row gap-4">
                    {{-- Child Radio --}}
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="register_type" value="kid" x-model="selectedType" class="sr-only peer">
                        <div class="border-2 rounded-xl p-5 flex items-center gap-4 transition-all hover:border-amber-300"
                             :class="selectedType === 'kid' ? 'border-amber-500 bg-amber-50 ring-2 ring-amber-500/20' : 'border-slate-200'">
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="selectedType === 'kid' ? 'border-amber-500 bg-amber-500' : 'border-slate-300'">
                                <div class="w-2 h-2 rounded-full bg-white" x-show="selectedType === 'kid'"></div>
                            </div>
                            <div>
                                <div class="font-display font-bold text-slate-900 uppercase text-sm">Child (Kid)</div>
                                <div class="text-xs text-slate-500 mt-0.5">Ages 5–17 · Cart system for multiple children</div>
                            </div>
                        </div>
                    </label>

                    {{-- Adult Radio --}}
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" name="register_type" value="adult" x-model="selectedType" class="sr-only peer">
                        <div class="border-2 rounded-xl p-5 flex items-center gap-4 transition-all hover:border-red-300"
                             :class="selectedType === 'adult' ? 'border-red-600 bg-red-50 ring-2 ring-red-600/20' : 'border-slate-200'">
                            <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center shrink-0 transition-colors"
                                 :class="selectedType === 'adult' ? 'border-red-600 bg-red-600' : 'border-slate-300'">
                                <div class="w-2 h-2 rounded-full bg-white" x-show="selectedType === 'adult'"></div>
                            </div>
                            <div>
                                <div class="font-display font-bold text-slate-900 uppercase text-sm">Adult</div>
                                <div class="text-xs text-slate-500 mt-0.5">Ages 18+ · Cart system for multiple adults</div>
                            </div>
                        </div>
                    </label>
                </div>

                <p class="text-xs text-slate-400 mt-3 text-center">Already registered? <a href="{{ route('payment.create') }}" class="text-red-700 font-semibold hover:underline">Pay your monthly fee here</a></p>
            </div>
        </div>

        {{-- Errors (shared) --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-6 max-w-4xl mx-auto">
            <div class="font-bold mb-1">Please fix the following:</div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- ═══════════════════════════════════════════════════ --}}
        {{-- CHILD (KID) FORM                                   --}}
        {{-- ═══════════════════════════════════════════════════ --}}
        <div x-show="selectedType === 'kid'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT: Child Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                        <h3 class="font-display text-xl font-bold text-slate-900 uppercase mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 bg-amber-400 text-amber-900 rounded-full flex items-center justify-center text-sm font-bold">
                                <span x-text="editing !== null ? '✎' : (cart.length + 1)"></span>
                            </span>
                            <span x-text="editing !== null ? 'Edit Child Details' : 'Child Details'"></span>
                        </h3>

                        <div class="space-y-5">
                            {{-- Child Name --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Child's Full Name <span class="text-red-500">*</span></label>
                                <input type="text" x-model="form.full_name" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Enter child's full name">
                            </div>

                            {{-- DOB --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                                <div class="grid grid-cols-3 gap-3">
                                    <select x-model="form.dob_day" class="px-3 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Day</option>
                                        <template x-for="d in 31"><option :value="d" x-text="d"></option></template>
                                    </select>
                                    <select x-model="form.dob_month" class="px-3 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Month</option>
                                        <template x-for="(m, i) in months"><option :value="i + 1" x-text="m"></option></template>
                                    </select>
                                    <select x-model="form.dob_year" class="px-3 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Year</option>
                                        <template x-for="y in years"><option :value="y" x-text="y"></option></template>
                                    </select>
                                </div>
                            </div>

                            {{-- Gender & Relationship --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Gender <span class="text-red-500">*</span></label>
                                    <select x-model="form.gender" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Relationship to Child <span class="text-red-500">*</span></label>
                                    <select x-model="form.relationship" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Select relationship</option>
                                        <option value="Parent">Parent</option>
                                        <option value="Guardian">Guardian</option>
                                        <option value="Sibling">Sibling</option>
                                        <option value="Relative">Relative</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Club / Dojo (moved before School & Location) --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Preferred Club / Dojo <span class="text-red-500">*</span></label>
                                <select x-model="form.club" @change="onClubChange()" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                    <option value="">Select a club</option>
                                    <option value="Nyeri Main Dojo">Nyeri Main Dojo — Nyeri County</option>
                                    <option value="Nanyuki Sports Club">Nanyuki Sports Club — Laikipia County</option>
                                    <option value="Murang'a Town Dojo">Murang'a Town Dojo — Murang'a County</option>
                                    <option value="Karatina University Club">Karatina University Club — Nyeri County</option>
                                    <option value="Othaya Youth Karate">Othaya Youth Karate — Nyeri County</option>
                                    <option value="Sagana Martial Arts">Sagana Martial Arts — Kirinyaga County</option>
                                    <option value="Kenol Defenders Dojo">Kenol Defenders Dojo — Murang'a County</option>
                                    <option value="Mukuyu Kids Club">Mukuyu Kids Club — Murang'a County</option>
                                </select>
                                <p class="text-xs text-slate-400 mt-1" x-show="form.club">
                                    <span class="text-red-600">✓</span> School &amp; location suggestions will match this club area.
                                </p>
                            </div>

                            {{-- School (with autocomplete) --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">School <span class="text-red-500">*</span></label>
                                <input type="text" x-model="form.school" list="schoolSuggestions" autocomplete="off" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Start typing or select from suggestions…">
                                <datalist id="schoolSuggestions">
                                    <template x-for="s in filteredSchools" :key="s"><option :value="s"></option></template>
                                </datalist>
                                <p class="text-xs text-slate-400 mt-1">Type to search or pick from suggestions based on the selected club area.</p>
                            </div>

                            {{-- Location (with autocomplete) --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Location / Area <span class="text-red-500">*</span></label>
                                <input type="text" x-model="form.location" list="locationSuggestions" autocomplete="off" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Start typing or select from suggestions…">
                                <datalist id="locationSuggestions">
                                    <template x-for="l in filteredLocations" :key="l"><option :value="l"></option></template>
                                </datalist>
                                <p class="text-xs text-slate-400 mt-1">Suggestions appear based on the selected club/dojo area.</p>
                            </div>

                            {{-- Child Photo (per-child, not bulk) --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Child's Photo <span class="text-slate-400 font-normal">(Optional)</span></label>
                                <input type="file" accept="image/*" @change="handleChildPhoto($event)" :id="'child_photo_input'" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                                <p class="text-xs text-slate-400 mt-1">Max 3MB. Accepted formats: JPG, PNG, WEBP. This photo will be attached to this child.</p>
                                {{-- Preview --}}
                                <template x-if="form.photoPreview">
                                    <div class="mt-2 flex items-center gap-3">
                                        <img :src="form.photoPreview" class="w-14 h-14 rounded-lg object-cover border-2 border-red-300 shadow-sm">
                                        <button type="button" @click="removeChildPhoto()" class="text-xs text-red-500 hover:text-red-700 font-medium">Remove photo</button>
                                    </div>
                                </template>
                            </div>

                            {{-- Fee --}}
                            <div class="bg-red-50 border border-red-200 rounded-xl p-4 flex items-center justify-between">
                                <span class="text-sm text-red-700 font-medium">Registration Fee</span>
                                <span class="font-display font-bold text-xl text-red-800">KSH 1,000</span>
                            </div>

                            {{-- Add / Update / Proceed buttons --}}
                            <div class="flex gap-3">
                                <template x-if="editing !== null">
                                    <div class="flex gap-3 w-full">
                                        <button @click="updateChild()" class="flex-1 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            Update Child
                                        </button>
                                        <button @click="cancelEdit()" class="px-6 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">Cancel</button>
                                    </div>
                                </template>
                                <template x-if="editing === null">
                                    <div class="flex flex-col sm:flex-row gap-3 w-full">
                                        <button @click="addToCart()" class="flex-1 bg-red-700 hover:bg-red-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                            Add Child to Cart
                                        </button>
                                        <button @click="proceedToPayment()" class="flex-1 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                            Proceed to Payment
                                        </button>
                                    </div>
                                </template>
                            </div>
                            <p class="text-xs text-slate-400 text-center" x-show="editing === null">
                                <strong>Add Child to Cart</strong> — add more children before paying. <strong>Proceed to Payment</strong> — add this child &amp; pay now.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Cart --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sticky top-6">
                        <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                            Cart (<span x-text="cart.length"></span>)
                        </h3>

                        <template x-if="cart.length === 0">
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                                <p class="text-slate-400 text-sm">No children added yet.<br>Fill the form and click "Add Child to Cart".</p>
                            </div>
                        </template>

                        <template x-if="cart.length > 0">
                            <div class="space-y-3">
                                <template x-for="(child, index) in cart" :key="index">
                                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                        <div class="flex items-start justify-between mb-2">
                                            <div class="flex items-center gap-2">
                                                <span class="w-6 h-6 bg-amber-400 text-amber-900 rounded-full flex items-center justify-center text-xs font-bold" x-text="index + 1"></span>
                                                <span class="font-bold text-slate-900 text-sm" x-text="child.full_name"></span>
                                            </div>
                                            <div class="flex gap-1.5">
                                                <button @click="editChild(index)" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                </button>
                                                <button @click="removeFromCart(index)" class="text-red-500 hover:text-red-700 p-1" title="Remove">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="text-xs text-slate-500 space-y-0.5">
                                            <div><span class="text-slate-400">Club:</span> <span x-text="child.club"></span></div>
                                            <div><span class="text-slate-400">School:</span> <span x-text="child.school"></span></div>
                                        </div>
                                        {{-- Per-child photo in cart --}}
                                        <div class="mt-2 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <template x-if="child.photoPreview">
                                                    <img :src="child.photoPreview" class="w-8 h-8 rounded-md object-cover border border-red-300">
                                                </template>
                                                <template x-if="!child.photoPreview">
                                                    <span class="text-xs text-slate-400 italic">No photo</span>
                                                </template>
                                            </div>
                                            <span class="text-red-700 font-display font-bold text-sm">KSH 1,000</span>
                                        </div>
                                    </div>
                                </template>

                                {{-- Total --}}
                                <div class="bg-red-50 rounded-xl p-4 border border-red-200 mt-2">
                                    <div class="flex items-center justify-between">
                                        <span class="font-display font-bold text-red-800 uppercase text-sm">Total</span>
                                        <span class="font-display font-bold text-2xl text-red-800" x-text="'KSH ' + (cart.length * 1000).toLocaleString()"></span>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- Proceed to payment --}}
                        <template x-if="cart.length > 0 && !showPayment">
                            <button @click="showPayment = true" class="w-full mt-4 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">
                                Proceed to Payment &rarr;
                            </button>
                        </template>

                        <template x-if="showPayment && cart.length > 0">
                            <form method="POST" action="{{ route('register.kid.store') }}" enctype="multipart/form-data" class="mt-4 space-y-4 border-t border-slate-200 pt-4" x-ref="kidPaymentForm" @submit="attachChildPhotos($event)">
                                @csrf
                                <input type="hidden" name="cart_data" :value="JSON.stringify(cart.map(c => ({full_name: c.full_name, dob_day: c.dob_day, dob_month: c.dob_month, dob_year: c.dob_year, gender: c.gender, relationship: c.relationship, school: c.school, location: c.location, club: c.club})))">

                                <h4 class="font-display font-bold text-slate-800 uppercase text-sm">Guardian / Parent Details</h4>
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Your Full Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="guardian_name" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Guardian's full name">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Phone Number <span class="text-red-500">*</span></label>
                                    <input type="tel" name="guardian_phone" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="+254 7XX XXX XXX">
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Email Address <span class="text-red-500">*</span></label>
                                    <input type="email" name="guardian_email" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="you@example.com">
                                </div>

                                {{-- Per-child photo previews & file inputs --}}
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-2">Children's Photos</label>
                                    <div class="space-y-2">
                                        <template x-for="(child, idx) in cart" :key="idx">
                                            <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-2.5 border border-slate-100">
                                                <template x-if="child.photoPreview">
                                                    <img :src="child.photoPreview" class="w-10 h-10 rounded-md object-cover border border-red-300 shrink-0">
                                                </template>
                                                <template x-if="!child.photoPreview">
                                                    <div class="w-10 h-10 bg-slate-200 rounded-md flex items-center justify-center shrink-0">
                                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                    </div>
                                                </template>
                                                <div class="flex-1 min-w-0">
                                                    <div class="text-sm font-medium text-slate-800 truncate" x-text="child.full_name"></div>
                                                    <div class="text-xs" :class="child.photoPreview ? 'text-red-600' : 'text-slate-400'" x-text="child.photoPreview ? '✓ Photo attached' : 'No photo'"></div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-1">Photos were attached during child entry. You can edit a child to change their photo.</p>
                                </div>

                                <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                        <span class="font-bold text-red-800 text-sm">M-Pesa Payment</span>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 flex items-center justify-between mb-3">
                                        <span class="text-slate-600 text-xs">Total for <span x-text="cart.length"></span> child(ren)</span>
                                        <span class="font-display font-bold text-red-700" x-text="'KSH ' + (cart.length * 1000).toLocaleString()"></span>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-600 mb-1">M-Pesa Phone <span class="text-red-500">*</span></label>
                                        <input type="tel" name="mpesa_phone" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="07XX XXX XXX">
                                    </div>
                                </div>

                                <button type="submit" class="w-full bg-red-700 hover:bg-red-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display">
                                    Register & Pay KSH <span x-text="(cart.length * 1000).toLocaleString()"></span> &rarr;
                                </button>
                                {{-- Dynamic file inputs for per-child photos --}}
                                <div x-ref="photoInputsContainer" class="hidden"></div>
                                <button type="button" @click="showPayment = false" class="w-full text-slate-500 hover:text-slate-700 text-sm transition-colors py-1">
                                    &larr; Back to cart
                                </button>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════════ --}}
        {{-- ADULT FORM (with Cart System)                      --}}
        {{-- ═══════════════════════════════════════════════════ --}}
        <div x-show="selectedType === 'adult'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT: Adult Details Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                        <h3 class="font-display text-xl font-bold text-slate-900 uppercase mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 bg-red-700 text-white rounded-full flex items-center justify-center text-sm font-bold">
                                <span x-text="adultEditing !== null ? '✎' : (adultCart.length + 1)"></span>
                            </span>
                            <span x-text="adultEditing !== null ? 'Edit Adult Details' : 'Adult Details'"></span>
                        </h3>

                        <div class="space-y-5">
                            {{-- Full Name --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" x-model="adultForm.full_name" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Enter full name">
                            </div>

                            {{-- Email & Phone --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                                    <input type="email" x-model="adultForm.email" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="you@example.com">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                                    <input type="tel" x-model="adultForm.phone" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="+254 7XX XXX XXX">
                                </div>
                            </div>

                            {{-- Gender & DOB --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Gender</label>
                                    <select x-model="adultForm.gender" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Select gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Date of Birth</label>
                                    <input type="date" x-model="adultForm.date_of_birth" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                </div>
                            </div>

                            {{-- Location --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Location / Area</label>
                                <input type="text" x-model="adultForm.location" list="adultLocationSuggestions" autocomplete="off" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Start typing or select from suggestions…">
                                <datalist id="adultLocationSuggestions">
                                    <template x-for="l in adultFilteredLocations" :key="l"><option :value="l"></option></template>
                                </datalist>
                            </div>

                            {{-- Program & Club --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Select Program <span class="text-red-500">*</span></label>
                                    <select x-model="adultForm.program" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Choose a program</option>
                                        <option value="teens-adults">Teens & Adults (Ages 13+)</option>
                                        <option value="competition">Elite Competition (Advanced)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Preferred Club / Dojo <span class="text-red-500">*</span></label>
                                    <select x-model="adultForm.club" @change="onAdultClubChange()" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
                                        <option value="">Select a club</option>
                                        <option value="Nyeri Main Dojo">Nyeri Main Dojo — Nyeri County</option>
                                        <option value="Nanyuki Sports Club">Nanyuki Sports Club — Laikipia County</option>
                                        <option value="Murang'a Town Dojo">Murang'a Town Dojo — Murang'a County</option>
                                        <option value="Karatina University Club">Karatina University Club — Nyeri County</option>
                                        <option value="Othaya Youth Karate">Othaya Youth Karate — Nyeri County</option>
                                        <option value="Sagana Martial Arts">Sagana Martial Arts — Kirinyaga County</option>
                                        <option value="Kenol Defenders Dojo">Kenol Defenders Dojo — Murang'a County</option>
                                        <option value="Mukuyu Kids Club">Mukuyu Kids Club — Murang'a County</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Emergency Contact --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Emergency Contact Name</label>
                                    <input type="text" x-model="adultForm.emergency_contact" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Emergency contact name">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Emergency Contact Phone</label>
                                    <input type="tel" x-model="adultForm.emergency_phone" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="+254 7XX XXX XXX">
                                </div>
                            </div>

                            {{-- Profile Photo (per-adult) --}}
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Profile Photo <span class="text-slate-400 font-normal">(Optional)</span></label>
                                <input type="file" accept="image/*" @change="handleAdultPhoto($event)" id="adult_photo_input" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                                <p class="text-xs text-slate-400 mt-1">Max 3MB. Accepted formats: JPG, PNG, WEBP. This photo will be attached to this person.</p>
                                {{-- Preview --}}
                                <template x-if="adultForm.photoPreview">
                                    <div class="mt-2 flex items-center gap-3">
                                        <img :src="adultForm.photoPreview" class="w-14 h-14 rounded-lg object-cover border-2 border-red-300 shadow-sm">
                                        <button type="button" @click="removeAdultPhoto()" class="text-xs text-red-500 hover:text-red-700 font-medium">Remove photo</button>
                                    </div>
                                </template>
                            </div>

                            {{-- Fee --}}
                            <div class="bg-red-50 border border-red-200 rounded-xl p-4 flex items-center justify-between">
                                <span class="text-sm text-red-700 font-medium">Registration Fee</span>
                                <span class="font-display font-bold text-xl text-red-800">KSH 1,000</span>
                            </div>

                            {{-- Add / Update / Proceed buttons --}}
                            <div class="flex gap-3">
                                <template x-if="adultEditing !== null">
                                    <div class="flex gap-3 w-full">
                                        <button @click="updateAdult()" class="flex-1 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            Update Person
                                        </button>
                                        <button @click="cancelAdultEdit()" class="px-6 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">Cancel</button>
                                    </div>
                                </template>
                                <template x-if="adultEditing === null">
                                    <div class="flex flex-col sm:flex-row gap-3 w-full">
                                        <button @click="addAdultToCart()" class="flex-1 bg-red-700 hover:bg-red-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                            Add Person to Cart
                                        </button>
                                        <button @click="proceedToAdultPayment()" class="flex-1 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                            Proceed to Payment
                                        </button>
                                    </div>
                                </template>
                            </div>
                            <p class="text-xs text-slate-400 text-center" x-show="adultEditing === null">
                                <strong>Add Person to Cart</strong> — register more people before paying. <strong>Proceed to Payment</strong> — add this person &amp; pay now.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- RIGHT: Adult Cart --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sticky top-6">
                        <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                            Cart (<span x-text="adultCart.length"></span>)
                        </h3>

                        {{-- Empty State --}}
                        <template x-if="adultCart.length === 0">
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                                <p class="text-slate-400 text-sm">No adults added yet.<br>Fill the form and click "Add Person to Cart".</p>
                            </div>
                        </template>

                        {{-- Cart Items --}}
                        <template x-if="adultCart.length > 0">
                            <div class="space-y-3">
                                <template x-for="(person, index) in adultCart" :key="index">
                                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100">
                                        <div class="flex items-start justify-between mb-2">
                                            <div class="flex items-center gap-2">
                                                <span class="w-6 h-6 bg-red-700 text-white rounded-full flex items-center justify-center text-xs font-bold" x-text="index + 1"></span>
                                                <span class="font-bold text-slate-900 text-sm" x-text="person.full_name"></span>
                                            </div>
                                            <div class="flex gap-1.5">
                                                <button @click="editAdult(index)" class="text-blue-600 hover:text-blue-800 p-1" title="Edit">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                </button>
                                                <button @click="removeAdultFromCart(index)" class="text-red-500 hover:text-red-700 p-1" title="Remove">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="text-xs text-slate-500 space-y-0.5">
                                            <div><span class="text-slate-400">Club:</span> <span x-text="person.club"></span></div>
                                            <div><span class="text-slate-400">Program:</span> <span x-text="person.program === 'teens-adults' ? 'Teens & Adults' : 'Elite Competition'"></span></div>
                                        </div>
                                        {{-- Per-adult photo in cart --}}
                                        <div class="mt-2 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <template x-if="person.photoPreview">
                                                    <img :src="person.photoPreview" class="w-8 h-8 rounded-md object-cover border border-red-300">
                                                </template>
                                                <template x-if="!person.photoPreview">
                                                    <span class="text-xs text-slate-400 italic">No photo</span>
                                                </template>
                                            </div>
                                            <span class="text-red-700 font-display font-bold text-sm">KSH 1,000</span>
                                        </div>
                                    </div>
                                </template>

                                {{-- Total --}}
                                <div class="bg-red-50 rounded-xl p-4 border border-red-200 mt-2">
                                    <div class="flex items-center justify-between">
                                        <span class="font-display font-bold text-red-800 uppercase text-sm">Total</span>
                                        <span class="font-display font-bold text-2xl text-red-800" x-text="'KSH ' + (adultCart.length * 1000).toLocaleString()"></span>
                                    </div>
                                </div>
                            </div>
                        </template>

                        {{-- Proceed to payment button --}}
                        <template x-if="adultCart.length > 0 && !showAdultPayment">
                            <button @click="showAdultPayment = true" class="w-full mt-4 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">
                                Proceed to Payment &rarr;
                            </button>
                        </template>

                        {{-- Payment Form --}}
                        <template x-if="showAdultPayment && adultCart.length > 0">
                            <form method="POST" action="{{ route('register.adult.store') }}" enctype="multipart/form-data" class="mt-4 space-y-4 border-t border-slate-200 pt-4" x-ref="adultPaymentForm" @submit="attachAdultPhotos($event)">
                                @csrf
                                <input type="hidden" name="cart_data" :value="JSON.stringify(adultCart.map(p => ({full_name: p.full_name, email: p.email, phone: p.phone, gender: p.gender, date_of_birth: p.date_of_birth, location: p.location, program: p.program, club: p.club, emergency_contact: p.emergency_contact, emergency_phone: p.emergency_phone})))">

                                {{-- Per-adult photo previews --}}
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-2">Registrants &amp; Photos</label>
                                    <div class="space-y-2">
                                        <template x-for="(person, idx) in adultCart" :key="idx">
                                            <div class="flex items-center gap-3 bg-slate-50 rounded-lg p-2.5 border border-slate-100">
                                                <template x-if="person.photoPreview">
                                                    <img :src="person.photoPreview" class="w-10 h-10 rounded-md object-cover border border-red-300 shrink-0">
                                                </template>
                                                <template x-if="!person.photoPreview">
                                                    <div class="w-10 h-10 bg-slate-200 rounded-md flex items-center justify-center shrink-0">
                                                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                                    </div>
                                                </template>
                                                <div class="flex-1 min-w-0">
                                                    <div class="text-sm font-medium text-slate-800 truncate" x-text="person.full_name"></div>
                                                    <div class="text-xs" :class="person.photoPreview ? 'text-red-600' : 'text-slate-400'" x-text="person.photoPreview ? '✓ Photo attached' : 'No photo'"></div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                    <p class="text-xs text-slate-400 mt-1">Photos were attached during entry. You can edit a person to change their photo.</p>
                                </div>

                                <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                                    <div class="flex items-center gap-2 mb-2">
                                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                        <span class="font-bold text-red-800 text-sm">M-Pesa Payment</span>
                                    </div>
                                    <div class="bg-white rounded-lg p-3 flex items-center justify-between mb-3">
                                        <span class="text-slate-600 text-xs">Total for <span x-text="adultCart.length"></span> person(s)</span>
                                        <span class="font-display font-bold text-red-700" x-text="'KSH ' + (adultCart.length * 1000).toLocaleString()"></span>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-slate-600 mb-1">M-Pesa Phone <span class="text-red-500">*</span></label>
                                        <input type="tel" name="mpesa_phone" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="07XX XXX XXX">
                                    </div>
                                </div>

                                <button type="submit" class="w-full bg-red-700 hover:bg-red-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display">
                                    Register & Pay KSH <span x-text="(adultCart.length * 1000).toLocaleString()"></span> &rarr;
                                </button>
                                {{-- Dynamic file inputs for per-adult photos --}}
                                <div x-ref="adultPhotoInputsContainer" class="hidden"></div>
                                <button type="button" @click="showAdultPayment = false" class="w-full text-slate-500 hover:text-slate-700 text-sm transition-colors py-1">
                                    &larr; Back to cart
                                </button>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        {{-- Prompt when nothing selected --}}
        <div x-show="!selectedType" class="text-center py-16 text-slate-400">
            <svg class="w-16 h-16 mx-auto mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M8 7l4-4m0 0l4 4m-4-4v18"/></svg>
            <p class="text-lg font-display font-bold uppercase">Select a category above to begin</p>
            <p class="text-sm mt-1">Choose "Child (Kid)" or "Adult" to reveal the registration form.</p>
        </div>

    </div>

    {{-- Alpine JS --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function registerPage() {
            return {
                selectedType: '',
                // ─── Kid Cart System ───
                cart: [],
                editing: null,
                showPayment: false,
                months: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                get years() {
                    const currentYear = new Date().getFullYear();
                    const years = [];
                    for (let y = currentYear - 3; y >= currentYear - 18; y--) years.push(y);
                    return years;
                },
                form: {
                    full_name: '', dob_day: '', dob_month: '', dob_year: '',
                    gender: '', relationship: '', school: '', location: '', club: '',
                    photoFile: null, photoPreview: null,
                },

                // ─── Club → Schools & Locations mapping ───
                clubData: {
                    'Nyeri Main Dojo': {
                        schools: ['Nyeri Primary School', 'Nyeri High School', 'Consolata Primary Nyeri', 'Kamuyu Primary', 'Dr. Aggrey Primary', 'Kangemi Primary Nyeri', 'Kiganjo Primary', 'Kamakwa Primary', 'Nyeri Hill Primary', 'Ruringu Primary'],
                        locations: ['Nyeri Town', 'Ruring\'u', 'Kamakwa', 'Kiganjo', 'Skuta', 'King\'ong\'o', 'Dekutts', 'Kangemi', 'Blue Valley']
                    },
                    'Nanyuki Sports Club': {
                        schools: ['Nanyuki Primary School', 'Nanyuki High School', 'St. Teresa\'s Nanyuki', 'Likii Primary', 'Muthaiga Primary Nanyuki', 'Nanyuki Junior Academy', 'Baraka Primary Nanyuki', 'Sweet Waters Primary'],
                        locations: ['Nanyuki Town', 'Likii', 'Muthaiga', 'Baraka', 'Sweetwaters', 'Nanyuki Airstrip', 'Doldol Road', 'Ontulili']
                    },
                    'Murang\'a Town Dojo': {
                        schools: ['Murang\'a Primary School', 'Murang\'a High School', 'Mumbi Primary', 'Ihura Primary', 'Murang\'a Township Primary', 'St. James Primary Murang\'a', 'Gikindu Primary'],
                        locations: ['Murang\'a Town', 'Ihura', 'Mumbi', 'Gikindu', 'Kiharu', 'Kangema Road', 'Maragua Junction']
                    },
                    'Karatina University Club': {
                        schools: ['Karatina Primary School', 'Karatina Day Secondary', 'Baricho Boys', 'Ragati Primary', 'Kabiru-ini Primary', 'Ndunyu Njeru Primary', 'Gatundu Primary Karatina'],
                        locations: ['Karatina Town', 'Ragati', 'Kabiru-ini', 'Ndunyu Njeru', 'Sagana Road', 'Thunguri', 'Baricho']
                    },
                    'Othaya Youth Karate': {
                        schools: ['Othaya Primary School', 'Othaya Girls High', 'Kamoko Primary', 'Mahiga Primary', 'Karima Primary', 'Chinga Primary'],
                        locations: ['Othaya Town', 'Karima', 'Mahiga', 'Chinga', 'Kamoko', 'Iria-ini']
                    },
                    'Sagana Martial Arts': {
                        schools: ['Sagana Primary School', 'Sagana High School', 'Kagumo Primary', 'Kianyaga Primary', 'Kutus Primary', 'Wanguru Primary'],
                        locations: ['Sagana Town', 'Kagumo', 'Kianyaga', 'Kutus', 'Wanguru', 'Kagio', 'Kerugoya']
                    },
                    'Kenol Defenders Dojo': {
                        schools: ['Kenol Primary School', 'Maragua Primary', 'Kenol Township Primary', 'Makuyu Primary', 'Kimorori Primary', 'Saba Saba Primary'],
                        locations: ['Kenol Town', 'Maragua', 'Makuyu', 'Kimorori', 'Saba Saba', 'Murang\'a South']
                    },
                    'Mukuyu Kids Club': {
                        schools: ['Mukuyu Primary School', 'Kahuro Primary', 'Mugoiri Primary', 'Gaichanjiru Primary', 'Murarandia Primary'],
                        locations: ['Mukuyu', 'Kahuro', 'Mugoiri', 'Gaichanjiru', 'Murarandia', 'Kigumo']
                    }
                },

                get filteredSchools() {
                    const club = this.form.club;
                    if (club && this.clubData[club]) return this.clubData[club].schools;
                    // Return all schools when no club selected
                    return Object.values(this.clubData).flatMap(d => d.schools);
                },
                get filteredLocations() {
                    const club = this.form.club;
                    if (club && this.clubData[club]) return this.clubData[club].locations;
                    return Object.values(this.clubData).flatMap(d => d.locations);
                },
                onClubChange() {
                    // Clear school/location when club changes so user picks from correct area
                    this.form.school = '';
                    this.form.location = '';
                },

                handleChildPhoto(event) {
                    const file = event.target.files[0];
                    if (file) {
                        if (file.size > 3 * 1024 * 1024) {
                            alert('Photo must be less than 3MB.');
                            event.target.value = '';
                            return;
                        }
                        this.form.photoFile = file;
                        this.form.photoPreview = URL.createObjectURL(file);
                    }
                },
                removeChildPhoto() {
                    this.form.photoFile = null;
                    this.form.photoPreview = null;
                    const input = document.getElementById('child_photo_input');
                    if (input) input.value = '';
                },

                resetForm() {
                    this.form = {
                        full_name: '', dob_day: '', dob_month: '', dob_year: '',
                        gender: '', relationship: '', school: '', location: '', club: '',
                        photoFile: null, photoPreview: null,
                    };
                    const input = document.getElementById('child_photo_input');
                    if (input) input.value = '';
                },
                validate() {
                    const f = this.form;
                    if (!f.full_name.trim()) { alert('Please enter the child\'s full name.'); return false; }
                    if (!f.dob_day || !f.dob_month || !f.dob_year) { alert('Please select the full date of birth.'); return false; }
                    if (!f.gender) { alert('Please select gender.'); return false; }
                    if (!f.relationship) { alert('Please select your relationship to the child.'); return false; }
                    if (!f.club) { alert('Please select a club/dojo.'); return false; }
                    if (!f.school.trim()) { alert('Please enter the school name.'); return false; }
                    if (!f.location.trim()) { alert('Please enter the location/area.'); return false; }
                    return true;
                },
                addToCart() {
                    if (!this.validate()) return;
                    this.cart.push({ ...this.form });
                    this.resetForm();
                    this.showPayment = false;
                },
                proceedToPayment() {
                    if (!this.validate()) return;
                    this.cart.push({ ...this.form });
                    this.resetForm();
                    this.showPayment = true;
                    this.$nextTick(() => {
                        document.querySelector('[x-ref="kidPaymentForm"]')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    });
                },
                removeFromCart(index) {
                    // Revoke the object URL to free memory
                    if (this.cart[index].photoPreview) URL.revokeObjectURL(this.cart[index].photoPreview);
                    this.cart.splice(index, 1);
                    if (this.cart.length === 0) this.showPayment = false;
                },
                editChild(index) {
                    this.editing = index;
                    this.form = { ...this.cart[index] };
                    this.showPayment = false;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                updateChild() {
                    if (!this.validate()) return;
                    this.cart[this.editing] = { ...this.form };
                    this.editing = null;
                    this.resetForm();
                },
                cancelEdit() {
                    this.editing = null;
                    this.resetForm();
                },
                attachChildPhotos(event) {
                    // Before form submits, inject per-child photo file inputs
                    const container = this.$refs.photoInputsContainer;
                    if (container) {
                        container.innerHTML = '';
                        this.cart.forEach((child, idx) => {
                            if (child.photoFile) {
                                const dt = new DataTransfer();
                                dt.items.add(child.photoFile);
                                const input = document.createElement('input');
                                input.type = 'file';
                                input.name = 'child_images[' + idx + ']';
                                input.files = dt.files;
                                container.appendChild(input);
                            }
                        });
                    }
                },

                // ─── Adult Cart System ───
                adultCart: [],
                adultEditing: null,
                showAdultPayment: false,
                adultForm: {
                    full_name: '', email: '', phone: '', gender: '', date_of_birth: '',
                    location: '', program: '', club: '',
                    emergency_contact: '', emergency_phone: '',
                    photoFile: null, photoPreview: null,
                },

                get adultFilteredLocations() {
                    const club = this.adultForm.club;
                    if (club && this.clubData[club]) return this.clubData[club].locations;
                    return Object.values(this.clubData).flatMap(d => d.locations);
                },
                onAdultClubChange() {
                    this.adultForm.location = '';
                },

                handleAdultPhoto(event) {
                    const file = event.target.files[0];
                    if (file) {
                        if (file.size > 3 * 1024 * 1024) {
                            alert('Photo must be less than 3MB.');
                            event.target.value = '';
                            return;
                        }
                        this.adultForm.photoFile = file;
                        this.adultForm.photoPreview = URL.createObjectURL(file);
                    }
                },
                removeAdultPhoto() {
                    this.adultForm.photoFile = null;
                    this.adultForm.photoPreview = null;
                    const input = document.getElementById('adult_photo_input');
                    if (input) input.value = '';
                },

                resetAdultForm() {
                    this.adultForm = {
                        full_name: '', email: '', phone: '', gender: '', date_of_birth: '',
                        location: '', program: '', club: '',
                        emergency_contact: '', emergency_phone: '',
                        photoFile: null, photoPreview: null,
                    };
                    const input = document.getElementById('adult_photo_input');
                    if (input) input.value = '';
                },
                validateAdult() {
                    const f = this.adultForm;
                    if (!f.full_name.trim()) { alert('Please enter the full name.'); return false; }
                    if (!f.email.trim()) { alert('Please enter an email address.'); return false; }
                    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(f.email)) { alert('Please enter a valid email address.'); return false; }
                    if (!f.phone.trim()) { alert('Please enter a phone number.'); return false; }
                    if (!f.program) { alert('Please select a training program.'); return false; }
                    if (!f.club) { alert('Please select a club/dojo.'); return false; }
                    // Check for duplicate emails in cart
                    const existing = this.adultCart.findIndex((p, i) => p.email.toLowerCase() === f.email.toLowerCase() && i !== this.adultEditing);
                    if (existing >= 0) { alert('This email address is already in the cart for ' + this.adultCart[existing].full_name + '.'); return false; }
                    return true;
                },
                addAdultToCart() {
                    if (!this.validateAdult()) return;
                    this.adultCart.push({ ...this.adultForm });
                    this.resetAdultForm();
                    this.showAdultPayment = false;
                },
                proceedToAdultPayment() {
                    if (!this.validateAdult()) return;
                    this.adultCart.push({ ...this.adultForm });
                    this.resetAdultForm();
                    this.showAdultPayment = true;
                    this.$nextTick(() => {
                        document.querySelector('[x-ref="adultPaymentForm"]')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    });
                },
                removeAdultFromCart(index) {
                    if (this.adultCart[index].photoPreview) URL.revokeObjectURL(this.adultCart[index].photoPreview);
                    this.adultCart.splice(index, 1);
                    if (this.adultCart.length === 0) this.showAdultPayment = false;
                },
                editAdult(index) {
                    this.adultEditing = index;
                    this.adultForm = { ...this.adultCart[index] };
                    this.showAdultPayment = false;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                },
                updateAdult() {
                    if (!this.validateAdult()) return;
                    this.adultCart[this.adultEditing] = { ...this.adultForm };
                    this.adultEditing = null;
                    this.resetAdultForm();
                },
                cancelAdultEdit() {
                    this.adultEditing = null;
                    this.resetAdultForm();
                },
                attachAdultPhotos(event) {
                    const container = this.$refs.adultPhotoInputsContainer;
                    if (container) {
                        container.innerHTML = '';
                        this.adultCart.forEach((person, idx) => {
                            if (person.photoFile) {
                                const dt = new DataTransfer();
                                dt.items.add(person.photoFile);
                                const input = document.createElement('input');
                                input.type = 'file';
                                input.name = 'adult_images[' + idx + ']';
                                input.files = dt.files;
                                container.appendChild(input);
                            }
                        });
                    }
                },
            };
        }
    </script>
</body>
</html>
