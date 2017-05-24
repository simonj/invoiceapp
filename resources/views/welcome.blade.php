<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <!-- Fonts -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{ mix('css/spark.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/landingpage.css') }}" rel="stylesheet">
</head>
<body class="border-thick">

<div class="container">
    <ul class="nav nav-pills pull-right">
        <li><a href="/register">Sign up</a></li>
        <li><a href="/login">Log in</a></li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="jumbo text-center">
                <img src="/img/logo.svg" alt="Invoiceapp.io">
                <h1>Invoice & payment for busy <br/> freelancers!</h1>
            </div><!-- /.jumbo -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-dark-soft">

            <img style="max-width: 100%;" src="https://kitetail.co/img/kitetail-devices.png" alt="">
            <hr>
            <p>
                <b>Invoiceapp.io</b> offers a lot of great features that you can enjoy, here is a list that just gets bigger and bigger:
            </p>
            <ul>
                <li>No Fees (besides Stripe’s standard fees)</li>
                <li>Send invoice by email</li>
                <li>Secure Online Payments</li>
                <li>Beautiful Emails and invoices</li>
                <li>Past Due Notices</li>
                <li>And much more...</li>
            </ul>
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->


</div><!-- /.container -->


</body>
</html>
