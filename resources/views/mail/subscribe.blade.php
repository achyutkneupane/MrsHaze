@component('mail::message')
# Subscribed to Newsletter

Hello **{{ $email }}**,

Thankyou for subscribing to my newsletter.

With love,<br>
**{{ config('app.name') }}**
@endcomponent
