<x-mail::message>
# 🥋 Free Trial Request

A new person has requested a free trial class at **Mukusho Karate Kenya**.

| Detail | Info |
|:-------|:-----|
| **Name** | {{ $trialName }} |
| **Phone** | {{ $trialPhone }} |
| **Program Interest** | {{ $trialProgram ?? 'Not specified' }} |
| **Message** | {{ $trialMessage ?? 'None' }} |
| **Date** | {{ now()->format('d M Y, h:i A') }} |

@php
    $rawPhone = preg_replace('/[^0-9]/', '', $trialPhone);
    if (str_starts_with($rawPhone, '0')) {
        $rawPhone = '254' . substr($rawPhone, 1);
    } elseif (!str_starts_with($rawPhone, '254')) {
        $rawPhone = '254' . $rawPhone;
    }
@endphp

<x-mail::button :url="'https://wa.me/' . $rawPhone">
Contact on WhatsApp
</x-mail::button>

Please follow up with this person as soon as possible.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
