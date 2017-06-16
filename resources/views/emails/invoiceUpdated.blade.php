@component('mail::message')

# Hello, {{ $client['contact_person'] ?: $client['company'] }}
I've updated the invoice.

@component('mail::table')
    | Quantity | Description  | Price  |
    | ------------- |:-------------:| --------:|
    @foreach($items as $item)
        | {{ $item['quantity'] }} | {{ $item['description'] }} | {{ $item['price'] }} |
    @endforeach
@endcomponent

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay')])
    Pay the invoice online before {{ $invoice->due_date }}
@endcomponent

Best regards,<br>
{{ $user->name }}

@endcomponent
