<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <!-- Fonts -->
    {{--<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>--}}

    <!-- CSS -->
    <link href="{{ mix('css/spark.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/landingpage.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <img style="margin-bottom: 3rem; width: 200px;" class="img-responsive center-block" src="/img/logo.svg" alt="">

            <div class="panel panel-default">
                <div class="panel-heading">
                    invoice
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
                                            Created: created_at<br>
                                            Due: due date
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
                                            company<br/>
                                            address 1<br/>
                                            state city zip <br/>
                                        </td>
                                        <td>
                                            contact_person<br>
                                            client email<br>
                                            Notes
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
                        <tr class="item">
                            <td>1</td>
                            <td>Created logo</td>
                            <td>123</td>
                        </tr>
                        <tr class="total">
                            <td></td>
                            <td></td>
                            <td>
                                Total: $123,-
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="clearfix"></div>
                </div><!-- panel-body -->
            </div><!-- panel-default -->
        </div><!-- col-md-10 -->
    </div><!-- row -->
</div><!-- container -->


</body>
<style>
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
</html>
