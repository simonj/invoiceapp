@component('mail::message')
# Hello, {{ $client->contact_person }}

I've marked your invoice as been paid.

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay'), 'color' => 'green'])
    See your invoice
@endcomponent

Thanks,<br>
{{ $user->name }}
@endcomponent


