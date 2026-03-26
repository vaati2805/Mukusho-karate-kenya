<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Child — Mukusho Karate Kenya</title>
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

    <div class="max-w-6xl mx-auto px-4 py-10" x-data="kidRegistration()" x-cloak>

        {{-- Header --}}
        <div class="text-center mb-8">
            <div class="inline-flex items-center bg-amber-50 text-amber-700 rounded-full px-4 py-1.5 text-sm font-semibold mb-4">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Child Registration
            </div>
            <h1 class="font-display text-3xl md:text-4xl font-bold text-slate-900 uppercase">Register Children</h1>
            <p class="text-slate-600 mt-2">Add one or more children, then pay for all of them in a single M-Pesa transaction.</p>
        </div>

        {{-- Errors --}}
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Child's Full Name <span class="text-red-500">*</span></label>
                                <input type="text" x-model="form.full_name" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="Enter child's full name">
                            </div>
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

                        {{-- Gender --}}
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

                        {{-- School --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">School <span class="text-red-500">*</span></label>
                                <input type="text" x-model="form.school" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="e.g. Nyeri Primary School">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Location / Area <span class="text-red-500">*</span></label>
                                <input type="text" x-model="form.location" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="e.g. Nyeri Town">
                            </div>
                        </div>

                        {{-- Club --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Preferred Club / Dojo <span class="text-red-500">*</span></label>
                            <select x-model="form.club" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm">
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

                        {{-- Fee input --}}
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Registration Amount (KSH) <span class="text-red-500">*</span></label>
                            <input type="number" x-model.number="form.amount" min="100" step="100" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="e.g. 1000">
                            <p class="text-xs text-slate-500 mt-1">Enter the amount you wish to pay for this child's registration. Minimum KSH 100.</p>
                        </div>

                        {{-- Add to Cart / Update --}}
                        <div class="flex gap-3">
                            <template x-if="editing !== null">
                                <div class="flex gap-3 w-full">
                                    <button @click="updateChild()" class="flex-1 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Update Child
                                    </button>
                                    <button @click="cancelEdit()" class="px-6 bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">
                                        Cancel
                                    </button>
                                </div>
                            </template>
                            <template x-if="editing === null">
                                <button @click="addToCart()" class="w-full bg-red-700 hover:bg-red-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                    Add Child to Cart
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT: Cart Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 sticky top-6">
                    <h3 class="font-display text-lg font-bold text-slate-900 uppercase mb-4 flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                        Registration Cart
                    </h3>

                    {{-- Empty State --}}
                    <template x-if="cart.length === 0">
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </div>
                            <p class="text-slate-400 text-sm">No children added yet.<br>Fill the form and click "Add Child to Cart".</p>
                        </div>
                    </template>

                    {{-- Cart Items --}}
                    <template x-if="cart.length > 0">
                        <div>
                            <div class="space-y-3 mb-4 max-h-[400px] overflow-y-auto">
                                <template x-for="(child, index) in cart" :key="index">
                                    <div class="bg-slate-50 rounded-xl p-4 border border-slate-100 relative">
                                        <div class="flex items-start justify-between gap-2">
                                            <div class="min-w-0">
                                                <div class="font-bold text-slate-800 text-sm truncate" x-text="child.full_name"></div>
                                                <div class="text-xs text-slate-500 mt-0.5" x-text="child.club"></div>
                                                <div class="text-xs text-slate-400 mt-0.5">
                                                    <span x-text="child.relationship"></span> &bull;
                                                    <span x-text="child.school"></span>
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-1 shrink-0">
                                                <button @click="editChild(index)" class="w-7 h-7 bg-white border border-slate-200 rounded-lg flex items-center justify-center hover:bg-amber-50 hover:border-amber-300 transition-colors" title="Edit">
                                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                </button>
                                                <button @click="removeFromCart(index)" class="w-7 h-7 bg-white border border-slate-200 rounded-lg flex items-center justify-center hover:bg-red-50 hover:border-red-300 transition-colors" title="Remove">
                                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center justify-between">
                                            <span class="text-[10px] font-bold uppercase tracking-wider text-red-600 bg-red-50 px-2 py-0.5 rounded-full" x-text="'Child ' + (index + 1)"></span>
                                            <span class="font-display font-bold text-red-700 text-sm" x-text="'KSH ' + (child.amount || 0).toLocaleString()"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            {{-- Summary --}}
                            <div class="border-t border-slate-200 pt-4 space-y-2">
                                <div class="flex justify-between text-sm text-slate-600">
                                    <span>Children</span>
                                    <span x-text="cart.length + ' children'"></span>
                                </div>
                                <div class="flex justify-between text-lg font-display font-bold text-slate-900">
                                    <span>Total</span>
                                    <span class="text-red-700" x-text="'KSH ' + cart.reduce((sum, c) => sum + (c.amount || 0), 0).toLocaleString()"></span>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- Guardian / Payment Section (shows when cart has items) --}}
                    <template x-if="cart.length > 0 && !showPayment">
                        <button @click="showPayment = true" class="w-full mt-4 bg-amber-500 hover:bg-amber-400 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all text-sm font-display">
                            Proceed to Payment &rarr;
                        </button>
                    </template>

                    <template x-if="showPayment && cart.length > 0">
                        <form method="POST" action="{{ route('register.kid.store') }}" enctype="multipart/form-data" class="mt-4 space-y-4 border-t border-slate-200 pt-4">
                            @csrf
                            {{-- Hidden cart data --}}
                            <input type="hidden" name="cart_data" :value="JSON.stringify(cart)">

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

                            {{-- Optional child photos --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Child Photo(s) <span class="text-slate-400 font-normal">(Optional)</span></label>
                                <input type="file" name="child_images[]" accept="image/*" multiple class="w-full px-3 py-2 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
                                <p class="text-xs text-slate-400 mt-1">Upload one photo per child (in cart order). Max 3MB each. Not mandatory.</p>
                            </div>

                            <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                    <span class="font-bold text-red-800 text-sm">M-Pesa Payment</span>
                                </div>
                                <div class="bg-white rounded-lg p-3 flex items-center justify-between mb-3">
                                    <span class="text-slate-600 text-xs">Total for <span x-text="cart.length"></span> child(ren)</span>
                                    <span class="font-display font-bold text-red-700" x-text="'KSH ' + cart.reduce((sum, c) => sum + (c.amount || 0), 0).toLocaleString()"></span>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">M-Pesa Phone <span class="text-red-500">*</span></label>
                                    <input type="tel" name="mpesa_phone" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 outline-none transition text-sm" placeholder="07XX XXX XXX">
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-red-700 hover:bg-red-600 text-white font-bold py-3.5 rounded-lg uppercase tracking-wide transition-all hover:shadow-lg text-sm font-display">
                                Register & Pay KSH <span x-text="cart.reduce((sum, c) => sum + (c.amount || 0), 0).toLocaleString()"></span> &rarr;
                            </button>
                            <button type="button" @click="showPayment = false" class="w-full text-slate-500 hover:text-slate-700 text-sm transition-colors py-1">
                                &larr; Back to cart
                            </button>
                        </form>
                    </template>
                </div>
            </div>
        </div>
    </div>

    {{-- Alpine JS --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function kidRegistration() {
            return {
                cart: [],
                editing: null,
                showPayment: false,
                months: ['January','February','March','April','May','June','July','August','September','October','November','December'],
                get years() {
                    const currentYear = new Date().getFullYear();
                    const years = [];
                    for (let y = currentYear - 3; y >= currentYear - 18; y--) {
                        years.push(y);
                    }
                    return years;
                },
                form: {
                    full_name: '',
                    dob_day: '',
                    dob_month: '',
                    dob_year: '',
                    gender: '',
                    relationship: '',
                    school: '',
                    location: '',
                    club: '',
                    amount: 1000,
                },
                resetForm() {
                    this.form = {
                        full_name: '',
                        dob_day: '',
                        dob_month: '',
                        dob_year: '',
                        gender: '',
                        relationship: '',
                        school: '',
                        location: '',
                        club: '',
                        amount: 1000,
                    };
                },
                validate() {
                    const f = this.form;
                    if (!f.full_name.trim()) { alert('Please enter the child\'s full name.'); return false; }
                    if (!f.dob_day || !f.dob_month || !f.dob_year) { alert('Please select the full date of birth.'); return false; }
                    if (!f.gender) { alert('Please select gender.'); return false; }
                    if (!f.relationship) { alert('Please select your relationship to the child.'); return false; }
                    if (!f.school.trim()) { alert('Please enter the school name.'); return false; }
                    if (!f.location.trim()) { alert('Please enter the location/area.'); return false; }
                    if (!f.club) { alert('Please select a club/dojo.'); return false; }
                    if (!f.amount || f.amount < 100) { alert('Please enter a registration amount (minimum KSH 100).'); return false; }
                    return true;
                },
                addToCart() {
                    if (!this.validate()) return;
                    this.cart.push({ ...this.form });
                    this.resetForm();
                    this.showPayment = false;
                },
                removeFromCart(index) {
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
            };
        }
    </script>
</body>
</html>
