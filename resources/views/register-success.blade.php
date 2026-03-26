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
        @keyframes checkmark { 0% { transform: scale(0) rotate(-45deg); opacity: 0; } 60% { transform: scale(1.1) rotate(0deg); opacity: 1; } 100% { transform: scale(1) rotate(0deg); opacity: 1; } }
        .animate-check { animation: checkmark 0.5s ease-out 0.2s both; }
        @keyframes pulse-green { 0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4); } 50% { box-shadow: 0 0 0 12px rgba(34, 197, 94, 0); } }
        .pulse-green { animation: pulse-green 2s ease-in-out infinite; }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="max-w-lg mx-auto px-4 text-center">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-check">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="font-display text-3xl font-bold text-slate-900 uppercase mb-3">Welcome to the Dojo!</h1>

            @if(session('success'))
                <p class="text-green-700 bg-green-50 border border-green-200 rounded-lg px-4 py-3 text-sm mb-6">{{ session('success') }}</p>
            @endif

            <p class="text-slate-600 mb-6">You are now a registered member of Mukusho Karate Kenya. Sensei Benard Kihachu and the team look forward to training with you!</p>

            {{-- WhatsApp Notification to Sensei --}}
            @if(session('reg_notify'))
            @php
                $notify = session('reg_notify');
                $senseiPhone = '254743909457';
                $type = $notify['type'] === 'kid' ? 'Kid(s)' : 'Adult(s)';
                $msg = "🥋 *NEW MUKUSHO REGISTRATION*\n\n";
                $msg .= "📋 *Type:* {$type}\n";
                $msg .= "👤 *Name(s):* {$notify['names']}\n";
                $msg .= "📞 *Phone:* {$notify['phone']}\n";
                if (!empty($notify['guardian'])) {
                    $msg .= "👨‍👩‍👧 *Guardian:* {$notify['guardian']}\n";
                }
                $msg .= "🏛️ *Club:* {$notify['club']}\n";
                $msg .= "💰 *Amount Paid:* KSH " . number_format($notify['amount']) . "\n";
                $msg .= "📅 *Date:* " . now()->format('d M Y, h:i A') . "\n\n";
                $msg .= "✅ Registration confirmed via Mukusho Karate Kenya website.";
                $waUrl = "https://wa.me/{$senseiPhone}?text=" . urlencode($msg);
            @endphp
            <div class="bg-green-50 border border-green-200 rounded-xl p-5 mb-6">
                <div class="flex items-center justify-center gap-2 mb-3">
                    <svg class="w-6 h-6 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    <h3 class="font-display font-bold text-green-800 uppercase text-base">Notify Sensei Kihachu</h3>
                </div>
                <p class="text-green-700 text-sm mb-4">Tap the button below to send your registration details to Sensei via WhatsApp. This helps the team prepare for your first session!</p>
                <a href="{{ $waUrl }}" target="_blank" id="whatsapp-notify-btn"
                   style="display:flex;align-items:center;justify-content:center;gap:8px;background:#25D366;color:#ffffff;font-weight:700;padding:14px 32px;border-radius:12px;text-transform:uppercase;font-size:14px;letter-spacing:0.05em;text-decoration:none;width:100%;box-shadow:0 4px 14px rgba(37,211,102,0.3);transition:all 0.2s;"
                   onmouseover="this.style.background='#20bd5a';this.style.transform='translateY(-2px)'"
                   onmouseout="this.style.background='#25D366';this.style.transform=''">
                    <svg style="width:20px;height:20px;" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Send Registration to Sensei via WhatsApp
                </a>
            </div>
            @endif

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

            <a href="/" style="display:inline-block;background:#b91c1c;color:#ffffff;font-weight:700;padding:12px 32px;border-radius:8px;text-transform:uppercase;font-size:14px;letter-spacing:0.05em;text-decoration:none;font-family:'Oswald',sans-serif;transition:all 0.2s;"
               onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#b91c1c'">
                &larr; Back to Home
            </a>
        </div>
    </div>

</body>
</html>
