@extends('spark::layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel {{ $invoice->paid == true ? 'panel-success' : 'panel-default' }} ">
                    <div class="panel-heading">
                        @if($invoice->paid == true)
                            Invoice paid
                        @else
                            Pay invoice
                        @endif
                    </div><!-- panel-heading -->
                    <div class="panel-body invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td class="title">
                                                <!--<img src="/images/logo.png" style="width:100%; max-width:300px;">-->
                                            </td>
                                            <td class="text-right">
                                                Created: {{ $invoice->created_at }}<br>
                                                Due: {{ $invoice->due_date }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="information">
                                <td>
                                    <table>
                                        <tbody>
                                        <tr>
                                            <td>
                                                {{ $invoice->clients->company }}<br/>
                                                {{ $invoice->clients->adress1 }}<br/>
                                                {{ $invoice->clients->state }} {{ $invoice->clients->city }} {{ $invoice->clients->zipcode }} <br/>
                                            </td>
                                            <td>
                                                {{ $invoice->clients->contact_person }}<br>
                                                {{ $invoice->clients->email }}<br>
                                                {{ $invoice->notes }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>Quantity</td>
                                <td>Description</td>
                                <td>Price</td>
                            </tr>
                            @foreach($invoice->items as $item)
                                <tr class="item">
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price }}</td>
                                </tr>
                            @endforeach
                            <tr class="total">
                                <td></td>
                                <td></td>
                                <td>
                                    Total: {{ $invoice->amount }}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        @if($invoice->paid == false)
                            <div class="panel-footer">
                                <form action="/invoices/charge" method="post" id="payment-form">

                                    <input type="hidden" name="reference_key" value="{{ $invoice->reference_key }}">

                                    {{ csrf_field() }}

                                    <div class="form-row">
                                        <label for="card-element">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element">
                                            <!-- a Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors -->
                                        <div id="card-errors"></div>
                                    </div>

                                    <button>Submit Payment</button>
                                </form>


                                <div class="clearfix"></div>
                            </div><!-- panel-footer -->
                        @endif
                    </div><!-- panel-body -->
                </div><!-- panel-default -->
            </div><!-- col-md-10 -->
        </div><!-- row -->
    </div><!-- container -->

@endsection

@section('javascript')

    <script src="https://js.stripe.com/v3/"></script>

    <script>

        // Create a Stripe client
        var stripe = Stripe('pk_test_rSxDv5P4cRJ8l40Yn9XA8sqw');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '24px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        const stripeTokenHandler = (token) => {
            // Insert the token ID into the form so it gets submitted to the server
            const form        = document.getElementById('payment-form');
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server
                    stripeTokenHandler(result.token);
                }
            });
        });

    </script>


@endsection

@section('scripts')


    <style>

        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        .invoice-box {
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(3) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** Fix for panel **/
        .panel {
            overflow: visible !important;
        }
    </style>

@endsection
