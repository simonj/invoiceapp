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
        <li><a href="#">Sign up</a></li>
        <li><a href="#">Log in</a></li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="jumbo text-center">
                <img src="/img/logo.svg" alt="Invoiceapp.io">
                <h1>Invoice & payment for busy freelancers!</h1>
            </div><!-- /.jumbo -->
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-dark-soft">

            <img style="max-width: 100%;" src="https://kitetail.co/img/kitetail-devices.png" alt="">
            <hr>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet, aut blanditiis deleniti distinctio doloribus ducimus enim esse facere ipsam iusto, laboriosam, provident quae quaerat similique totam voluptate! Aut, quo!
            </p>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
                <li>Lorem ipsum dolor sit amet, consectetur </li>
            </ul>
        </div><!-- /.col-md-12 -->
    </div><!-- /.row -->



</div><!-- /.container -->


</body>
</html>
