<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard — Mukusho Karate Kenya</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mukusho-logo.jpeg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-display { font-family: 'Oswald', sans-serif; }
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen">

    {{-- Admin Top Nav --}}
    <nav class="bg-slate-900 text-white sticky top-0 z-50 no-print">
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
                    @if(Auth::user()->canView('content'))
                    <a href="{{ route('admin.content.index') }}" class="text-amber-400 hover:text-amber-300 text-sm font-semibold transition-colors">📝 Content Manager</a>
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

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Total Members</p>
                        <p class="text-3xl font-display font-bold text-slate-900">{{ $stats['total_members'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Active Members</p>
                        <p class="text-3xl font-display font-bold text-green-600">{{ $stats['active_members'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Total Revenue</p>
                        <p class="text-3xl font-display font-bold text-amber-600">KSH {{ number_format($stats['total_revenue']) }}</p>
                    </div>
                    <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-slate-500">Monthly Payments</p>
                        <p class="text-3xl font-display font-bold text-red-700">{{ $stats['monthly_payments'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tab Switcher --}}
        <div class="flex items-center gap-2 mb-6 no-print">
            @if(Auth::user()->canView('members'))
            <a href="{{ route('admin.dashboard', ['tab' => 'members']) }}"
               class="px-5 py-2.5 rounded-lg font-display font-bold uppercase text-sm tracking-wide transition-all {{ $tab === 'members' ? 'bg-green-700 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
                Members
            </a>
            @endif
            @if(Auth::user()->canView('payments'))
            <a href="{{ route('admin.dashboard', ['tab' => 'payments']) }}"
               class="px-5 py-2.5 rounded-lg font-display font-bold uppercase text-sm tracking-wide transition-all {{ $tab === 'payments' ? 'bg-green-700 text-white shadow-lg' : 'bg-white text-slate-600 hover:bg-slate-50 border border-slate-200' }}">
                Payments
            </a>
            @endif
        </div>

        {{-- MEMBERS TABLE --}}
        @if($tab === 'members' && Auth::user()->canView('members'))
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between no-print">
                <h2 class="font-display text-xl font-bold text-slate-900 uppercase">Registered Members</h2>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.export.members.csv') }}" class="inline-flex items-center gap-1.5 bg-green-600 hover:bg-green-500 text-white text-xs font-bold py-2 px-3 rounded-lg transition-all uppercase tracking-wide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        CSV
                    </a>
                    <a href="{{ route('admin.export.members.xls') }}" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold py-2 px-3 rounded-lg transition-all uppercase tracking-wide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        XLS
                    </a>
                    <a href="{{ route('admin.export.members.pdf') }}" target="_blank" class="inline-flex items-center gap-1.5 bg-red-600 hover:bg-red-500 text-white text-xs font-bold py-2 px-3 rounded-lg transition-all uppercase tracking-wide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        PDF
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">#</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Full Name</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Phone</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Program</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Belt</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Paid</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Registered</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($members as $member)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3 text-slate-500">{{ $member->id }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ $member->full_name }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $member->email }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $member->phone }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-block bg-slate-100 text-slate-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase">{{ $member->program }}</span>
                            </td>
                            <td class="px-4 py-3 text-slate-600">{{ $member->belt_rank }}</td>
                            <td class="px-4 py-3">
                                @if($member->membership_paid)
                                    <span class="inline-flex items-center gap-1 text-green-700 bg-green-50 text-xs font-bold px-2.5 py-1 rounded-full">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                        Yes
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-red-700 bg-red-50 text-xs font-bold px-2.5 py-1 rounded-full">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                        No
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @php
                                    $statusColors = [
                                        'active' => 'bg-green-50 text-green-700',
                                        'inactive' => 'bg-slate-100 text-slate-600',
                                        'pending' => 'bg-amber-50 text-amber-700',
                                    ];
                                @endphp
                                <span class="inline-block {{ $statusColors[$member->status] ?? 'bg-slate-100 text-slate-600' }} text-xs font-bold px-2.5 py-1 rounded-full uppercase">{{ $member->status }}</span>
                            </td>
                            <td class="px-4 py-3 text-slate-500 text-xs">{{ $member->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="px-4 py-12 text-center text-slate-400">
                                <div class="text-4xl mb-2">&#x1F94B;</div>
                                No members registered yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        {{-- PAYMENTS TABLE --}}
        @if($tab === 'payments' && Auth::user()->canView('payments'))
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 flex items-center justify-between no-print">
                <h2 class="font-display text-xl font-bold text-slate-900 uppercase">Payment Records</h2>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.export.payments.csv') }}" class="inline-flex items-center gap-1.5 bg-green-600 hover:bg-green-500 text-white text-xs font-bold py-2 px-3 rounded-lg transition-all uppercase tracking-wide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        CSV
                    </a>
                    <a href="{{ route('admin.export.payments.xls') }}" class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold py-2 px-3 rounded-lg transition-all uppercase tracking-wide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        XLS
                    </a>
                    <a href="{{ route('admin.export.payments.pdf') }}" target="_blank" class="inline-flex items-center gap-1.5 bg-red-600 hover:bg-red-500 text-white text-xs font-bold py-2 px-3 rounded-lg transition-all uppercase tracking-wide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        PDF
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-600">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">#</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Member</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Type</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">M-Pesa Receipt</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">M-Pesa Phone</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Month For</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left font-semibold uppercase text-xs tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($payments as $payment)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3 text-slate-500">{{ $payment->id }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900">{{ $payment->member->full_name ?? 'N/A' }}</td>
                            <td class="px-4 py-3 font-bold text-slate-900">KSH {{ number_format($payment->amount) }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $typeColors = [
                                        'registration' => 'bg-blue-50 text-blue-700',
                                        'monthly' => 'bg-purple-50 text-purple-700',
                                    ];
                                @endphp
                                <span class="inline-block {{ $typeColors[$payment->payment_type] ?? 'bg-slate-100 text-slate-600' }} text-xs font-bold px-2.5 py-1 rounded-full uppercase">{{ $payment->payment_type }}</span>
                            </td>
                            <td class="px-4 py-3 font-mono text-xs text-slate-600">{{ $payment->mpesa_receipt ?? '—' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $payment->mpesa_phone ?? '—' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $payment->month_for ?? '—' }}</td>
                            <td class="px-4 py-3">
                                @php
                                    $payStatusColors = [
                                        'completed' => 'bg-green-50 text-green-700',
                                        'pending' => 'bg-amber-50 text-amber-700',
                                        'failed' => 'bg-red-50 text-red-700',
                                    ];
                                @endphp
                                <span class="inline-block {{ $payStatusColors[$payment->status] ?? 'bg-slate-100 text-slate-600' }} text-xs font-bold px-2.5 py-1 rounded-full uppercase">{{ $payment->status }}</span>
                            </td>
                            <td class="px-4 py-3 text-slate-500 text-xs">{{ $payment->transaction_date ? $payment->transaction_date->format('d M Y H:i') : $payment->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="px-4 py-12 text-center text-slate-400">
                                <div class="text-4xl mb-2">&#x1F4B0;</div>
                                No payments recorded yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>

</body>
</html>
