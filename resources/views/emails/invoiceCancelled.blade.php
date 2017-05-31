@component('mail::message')
# Hello, {{ $client->contact_person }}

Your invoice as been deleted.

Best regards,<br>
{{ $user->name }}
@endcomponent


