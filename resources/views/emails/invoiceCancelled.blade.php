@component('mail::message')

# Hello, {{ ucfirst($client['contact_person']) ?: ucfirst($client['company']) }}
Your invoice as been cancelled.

Best regards,<br>
{{ ucfirst($user->name) }}
@endcomponent


