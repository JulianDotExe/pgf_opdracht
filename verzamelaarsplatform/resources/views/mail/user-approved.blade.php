@component('mail::message')
    # Je account is goedgekeurd

    Beste {{ $user->name }},

    Je account is succesvol goedgekeurd. Je kunt nu inloggen op onze website.

    Bedankt,
    Het {{ config('app.name') }} team
@endcomponent