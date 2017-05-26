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
        @if(Auth::user())
            <li><a href="/home">Go to dashboard &rarr;</a></li>
        @else
            <li><a href="/register">Sign up</a></li>
            <li><a href="/login">Log in</a></li>
        @endif
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
        <div id="offers" class="col-md-8 col-md-offset-2 text-dark-soft">

            <img style="max-width: 100%;" src="/img/macbook.png" alt="">
            <hr>
            <p>
                <b>Invoiceapp.io</b> offers All the tools you need to run your freelance business
            </p>
            <br/>
            <ul>
                <li>Charts & reports</li>
                <li>Send invoice by email</li>
                <li>Secure Online Payments</li>
                <li>Beautiful Emails and invoices</li>
                <li>No Fees <small>(besides Stripe’s standard fees)</small></li>
                <li>Track invoices sent, opened and when they're overdue</li>
                <li>Check on how your business is performing with reports</li>
                <li>And thats just some of the features</li>
            </ul>
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
</div><!-- /.container -->
</body>
</html>
