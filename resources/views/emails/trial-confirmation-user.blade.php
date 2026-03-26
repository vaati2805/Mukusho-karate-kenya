<x-mail::message>
# 🥋 Welcome, {{ $userName }}!

Thank you for requesting a **free trial class** at **Mukusho Karate Kenya**!

We've received your request and will contact you shortly to schedule your session.

@if($program)
| Detail | Info |
|:-------|:-----|
| **Program Interest** | {{ $program }} |
@endif

## What to Expect

- **Wear comfortable clothing** — no special gear needed for your first class
- **Training Times:** Monday – Thursday, 5:30 PM – 7:30 PM
- **Locations:** Othaya Catholic Parish Hall (Nyeri), ACK St. James Cathedral (Murang'a), Nanyuki

<x-mail::button url="https://wa.me/254724216488?text=Hi%20Sensei%2C%20I%20just%20signed%20up%20for%20a%20free%20trial!">
Chat with Sensei on WhatsApp
</x-mail::button>

No commitment required — come train with us and decide!

With respect,<br>
**Sensei Benard Kihachu**<br>
{{ config('app.name') }}
</x-mail::message>
