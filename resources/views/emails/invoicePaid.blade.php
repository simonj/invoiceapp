@component('mail::message')

# Hello, {{ $client['contact_person'] ?: $client['company'] }}
Your invoice as been marked as paid.

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay'), 'color' => 'green'])
    See your invoice
@endcomponent

Best regards,<br>
{{ $user->name }}
@endcomponent


