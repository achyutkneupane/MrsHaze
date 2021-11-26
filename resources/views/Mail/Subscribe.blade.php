@component('mail::message')
# Subscribed to Newsletter

Hello **{{ $email }}**,

Thankyou for subscribing to my newsletter.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

With love,<br>
**{{ config('app.name') }}**
@endcomponent
