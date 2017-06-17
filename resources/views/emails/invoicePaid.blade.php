@component('mail::message')

# Hello, {{ ucfirst($client['contact_person']) ?: ucfirst($client['company']) }}
Your invoice as been marked as paid.

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay'), 'color' => 'green'])
    See your invoice
@endcomponent

Best regards,<br>
{{ ucfirst($user->name) }}
@endcomponent


