@component('mail::message')

# Hello, {{ $client }}
I've created an invoice for the work i did for you.

@component('mail::table')
    | Quantity | Description  | Price  |
    | ------------- |:-------------:| --------:|
    @foreach($items as $item)
    | {{ $item->quantity }} | {{ $item->description }} | {{ $item->price }} |
    @endforeach
@endcomponent

@component('mail::button', ['url' => url('invoices/'. $invoice->reference_key .'/pay')])
Pay the invoice online before {{ $invoice->due_date }}
@endcomponent

Thanks,<br>
{{ $user->name }}

<img border="0" width="1" height="1" src="{{ url('invoices/'. $invoice->reference_key .'/hasSeenEmail') }}" alt="">
    
@endcomponent
