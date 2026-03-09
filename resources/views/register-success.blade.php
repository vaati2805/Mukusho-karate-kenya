<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successful — Mukusho Karate Kenya</title>
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
            <h1 class="font-display text-3xl font-bold text-slate-900 uppercase mb-3">Welcome to the Dojo!</h1>

            @if(session('success'))
                <p class="text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3 text-sm mb-6">{{ session('success') }}</p>
            @endif

            <p class="text-slate-600 mb-6">You are now a registered member of Mukusho Karate Kenya. Sensei Benard Kihachu and the team look forward to training with you!</p>

            <div class="bg-slate-50 rounded-xl p-5 text-left mb-6">
                <h3 class="font-display font-bold text-slate-900 uppercase text-sm mb-3">Next Steps:</h3>
                <ul class="text-sm text-slate-600 space-y-2">
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Come to training: Mon–Thu, 5:30–7:30 PM
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Location: Othaya Catholic Parish Hall, Nyeri County
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Wear comfortable athletic clothing
                    </li>
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 text-green-500 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        Questions? Call 0724 216 488
                    </li>
                </ul>
            </div>

            <a href="/" class="inline-block bg-green-700 hover:bg-green-600 text-white font-bold py-3 px-8 rounded-lg uppercase text-sm tracking-wide transition-all font-display">
                &larr; Back to Home
            </a>
        </div>
    </div>

</body>
</html>
