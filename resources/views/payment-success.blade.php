<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful — Mukusho Karate Kenya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-display { font-family: 'Oswald', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="max-w-lg mx-auto px-4 text-center">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="font-display text-3xl font-bold text-slate-900 uppercase mb-3">Payment Received!</h1>

            @if(session('success'))
                <p class="text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3 text-sm mb-6">{{ session('success') }}</p>
            @endif

            <p class="text-slate-600 mb-6">Your monthly fee has been processed. Keep training hard and stay consistent!</p>

            <div class="flex gap-3 justify-center">
                <a href="/" class="inline-block bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg uppercase text-sm tracking-wide transition-all font-display">
                    &larr; Home
                </a>
                <a href="{{ route('payment.create') }}" class="inline-block bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-3 px-6 rounded-lg uppercase text-sm tracking-wide transition-all font-display">
                    Pay Again
                </a>
            </div>
        </div>
    </div>

</body>
</html>
