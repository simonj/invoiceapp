@component('mail::message')

# Hello, {{ $client['contact_person'] ?: $client['company'] }}
Your invoice as been deleted.

Best regards,<br>
{{ $user->name }}
@endcomponent


