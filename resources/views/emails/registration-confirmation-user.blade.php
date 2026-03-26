<x-mail::message>
# 🥋 Registration Confirmed!

@if($memberType === 'kid')
Dear {{ $guardian ?? 'Parent/Guardian' }},

Your {{ $count > 1 ? $count . ' children have' : 'child has' }} been successfully registered at **Mukusho Karate Kenya**!
@else
Dear {{ $names }},

You have been successfully registered at **Mukusho Karate Kenya**!
@endif

| Detail | Info |
|:-------|:-----|
| **Member(s)** | {{ $names }} |
| **Type** | {{ $memberType === 'kid' ? 'Kid(s)' : 'Adult' }} |
| **Club** | {{ $club }} |
| **Amount Paid** | KSH {{ number_format($amount) }} |
| **Date** | {{ now()->format('d M Y, h:i A') }} |

## Next Steps

- ✅ Attend training sessions: **Mon-Thu, 5:30 PM – 7:30 PM**
- 🥋 Starting belt rank: **White Belt (10th Kyu)**
- 💳 Monthly fee: **KSH 1,000** (due at the start of each month)

<x-mail::button url="https://wa.me/254724216488">
Contact Sensei on WhatsApp
</x-mail::button>

Welcome to the dojo! We look forward to seeing you on the mat.

With respect,<br>
**Sensei Benard Kihachu**<br>
{{ config('app.name') }}
</x-mail::message>
