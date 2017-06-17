@component('mail::message')

# Hello, {{ ucfirst($client['contact_person']) ?: ucfirst($client['company']) }}
I've updated the invoice.

@component('mail::table')
    | Quantity | Description  | Price  |
    | ------------- |:-------------:| --------:|
    @foreach($items as $item)
        | {{ $item['quantity'] }} | {{ ucfirst($item['description']) }} | {{ $item['price'] }} |
    @endforeach
    | | __Total:__ | ${{ $invoice->amount }},- |
@endcomponent

@if($invoice->notes)
@component('mail::panel')
    {{ ucfirst($invoice->notes) }}
@endcomponent
@endif

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay')])
    Pay the invoice online before {{ $invoice->due_date->format('m-d-Y') }}
@endcomponent

Best regards,<br>
{{ ucfirst($user->name) }}

@endcomponent
