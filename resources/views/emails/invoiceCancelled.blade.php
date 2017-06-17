@component('mail::message')

# Hello, {{ ucfirst($client['contact_person']) ?: ucfirst($client['company']) }}
Your invoice as been deleted.

Best regards,<br>
{{ ucfirst($user->name) }}
@endcomponent


