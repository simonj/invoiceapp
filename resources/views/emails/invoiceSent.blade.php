@component('mail::message')

# Hello, {{ $client['contact_person'] ?: $client['company'] }}
I've created an invoice for the work i did for you.

@component('mail::table')
    | Quantity | Description  | Price  |
    | ------------- |:-------------:| --------:|
    @foreach($items as $item)
    | {{ $item->quantity }} | {{ $item->description }} | {{ $item->price }} |
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
{{ $user->name }}

<img style="display:none;" border="0" width="1" height="1" src="{{ url('invoices/'. $invoice->reference_key .'/hasSeenEmail') }}" alt="">
    
@endcomponent
