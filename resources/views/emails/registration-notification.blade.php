<x-mail::message>
# 🥋 New Member Registration

A new member has registered at **Mukusho Karate Kenya**!

| Detail | Info |
|:-------|:-----|
| **Type** | {{ $memberType === 'kid' ? 'Kid(s)' : 'Adult(s)' }} |
| **Name(s)** | {{ $names }} |
| **Count** | {{ $count }} |
| **Phone** | {{ $phone }} |
@if($guardian)
| **Guardian** | {{ $guardian }} |
@endif
| **Club** | {{ $club }} |
| **Amount Paid** | KSH {{ number_format($amount) }} |
| **Date** | {{ now()->format('d M Y, h:i A') }} |

@php
    $rawPhone = preg_replace('/[^0-9]/', '', $phone);
    if (str_starts_with($rawPhone, '0')) {
        $rawPhone = '254' . substr($rawPhone, 1);
    } elseif (!str_starts_with($rawPhone, '254')) {
        $rawPhone = '254' . $rawPhone;
    }
@endphp

<x-mail::button :url="'https://wa.me/' . $rawPhone">
Contact on WhatsApp
</x-mail::button>

Registration confirmed via the Mukusho Karate Kenya website.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
