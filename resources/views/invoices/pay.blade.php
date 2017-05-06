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
                                <form action="/charge" method="post" id="payment-form">

                                    <input type="hidden" name="reference_key" value="{{ $invoice->reference_key }}">

                                    {{ csrf_field() }}

                                    <div class="group">
                                        <label>
                                            <span>Name</span>
                                            <input name="cardholder-name" class="field" placeholder="Jane Doe"/>
                                        </label>
                                        <label>
                                            <span>Phone</span>
                                            <input class="field" placeholder="(123) 456-7890" type="tel"/>
                                        </label>
                                    </div>
                                    <div class="group">
                                        <label>
                                            <span>Card</span>
                                            <div id="card-element" class="field"></div>
                                        </label>
                                    </div>
                                    <button type="submit">Pay $25</button>
                                    <div class="outcome">
                                        <div class="error"></div>
                                        <div class="success">
                                            Success! Your Stripe token is <span class="token"></span>
                                        </div>
                                    </div>
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

        var stripe   = Stripe('pk_test_rSxDv5P4cRJ8l40Yn9XA8sqw');
        var elements = stripe.elements();

        var card = elements.create('card', {
            style: {
                base: {
                    iconColor : '#666EE8',
                    color     : '#31325F',
                    lineHeight: '40px',
                    fontWeight: 300,
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSize  : '15px',

                    '::placeholder': {
                        color: '#CFD7E0',
                    },
                },
            }
        });
        card.mount('#card-element');

        function setOutcome(result) {
            var successElement = document.querySelector('.success');
            var errorElement   = document.querySelector('.error');
            successElement.classList.remove('visible');
            errorElement.classList.remove('visible');

            if(result.token) {
                // Use the token to create a charge or a customer
                // https://stripe.com/docs/charges
                successElement.querySelector('.token').textContent = result.token.id;
                successElement.classList.add('visible');
            } else if(result.error) {
                errorElement.textContent = result.error.message;
                errorElement.classList.add('visible');
            }
        }

        card.on('change', function(event) {
            setOutcome(event);
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            var form         = document.querySelector('form');
            var extraDetails = {
                name: form.querySelector('input[name=cardholder-name]').value,
            };
            stripe.createToken(card, extraDetails).then(setOutcome);
        });

    </script>


@endsection

@section('scripts')


    <style>

        form {
            width: 480px;
            margin: 20px auto;
        }

        .group {
            background: white;
            box-shadow: 0 7px 14px 0 rgba(49, 49, 93, 0.10),
            0 3px 6px 0 rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            margin-bottom: 20px;
        }

        label {
            position: relative;
            color: #8898AA;
            font-weight: 300;
            height: 40px;
            line-height: 40px;
            margin-left: 20px;
            display: block;
        }

        .group label:not(:last-child) {
            border-bottom: 1px solid #F0F5FA;
        }

        label > span {
            width: 20%;
            text-align: right;
            float: left;
        }

        .field {
            background: transparent;
            font-weight: 300;
            border: 0;
            color: #31325F;
            outline: none;
            padding-right: 10px;
            padding-left: 10px;
            cursor: text;
            width: 70%;
            height: 40px;
            float: right;
        }

        .field::-webkit-input-placeholder {
            color: #CFD7E0;
        }

        .field::-moz-placeholder {
            color: #CFD7E0;
        }

        .field:-ms-input-placeholder {
            color: #CFD7E0;
        }

        button {
            float: left;
            display: block;
            background: #666EE8;
            color: white;
            box-shadow: 0 7px 14px 0 rgba(49, 49, 93, 0.10),
            0 3px 6px 0 rgba(0, 0, 0, 0.08);
            border-radius: 4px;
            border: 0;
            margin-top: 20px;
            font-size: 15px;
            font-weight: 400;
            width: 100%;
            height: 40px;
            line-height: 38px;
            outline: none;
        }

        button:focus {
            background: #555ABF;
        }

        button:active {
            background: #43458B;
        }

        .outcome {
            float: left;
            width: 100%;
            padding-top: 8px;
            min-height: 24px;
            text-align: center;
        }

        .success, .error {
            display: none;
            font-size: 13px;
        }

        .success.visible, .error.visible {
            display: inline;
        }

        .error {
            color: #E4584C;
        }

        .success {
            color: #666EE8;
        }

        .success .token {
            font-weight: 500;
            font-size: 13px;
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
