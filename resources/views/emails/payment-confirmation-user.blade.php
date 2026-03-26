<x-mail::message>
# 🥋 Payment Received — Thank You!

Dear member,

Your monthly payment has been successfully received at **Mukusho Karate Kenya**.

| Detail | Info |
|:-------|:-----|
| **Member** | {{ $memberName }} |
| **Amount** | KSH {{ number_format($amount) }} |
| **Month** | {{ $monthFor }} |
| **Receipt No.** | {{ $receipt }} |
| **Date** | {{ now()->format('d M Y, h:i A') }} |

Your membership is active. Keep up the training!

<x-mail::button url="https://wa.me/254724216488">
Contact Sensei on WhatsApp
</x-mail::button>

With respect,<br>
**Sensei Benard Kihachu**<br>
{{ config('app.name') }}
</x-mail::message>
