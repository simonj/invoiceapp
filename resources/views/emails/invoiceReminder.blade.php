@component('mail::message')

# Hello, {{ ucfirst($client['contact_person']) ?: ucfirst($client['company']) }}
This is an auto-generated mail to let you know
that there is less than a week until the due date is ending.

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay')])
    Pay the invoice online before {{ Carbon\Carbon::parse($invoice->due_date)->format('m-d-Y') }}
@endcomponent

Best regards,<br>
{{ ucfirst($user->name) }}

@endcomponent
