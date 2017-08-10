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

<div class="row">
    <div class="container-fluid">
        <div id="header" class="col-md-12">
            <ul class="nav nav-pills pull-right">
                @if(Auth::user())
                    <li><a href="/home">Go to dashboard &rarr;</a></li>
                @else
                    <li><a href="/register">Sign up</a></li>
                    <li><a href="/login">Log in</a></li>
                @endif
            </ul>
            <div class="jumbo text-center">
                <img src="/img/logo.svg" alt="Invoiceapp.io">
                <h1 class="hero-text">Impress clients with <br/> beautiful invoices</h1>
            </div><!-- /.jumbo -->

            <div id="webUI" class="text-center">

                <svg width="987px" height="511px" viewBox="0 0 987 511" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 43.2 (39069) - http://www.bohemiancoding.com/sketch -->
                    <desc>Created with Sketch.</desc>
                    <defs>
                        <path d="M0,8.00342045 C0,3.58325339 3.5739094,0 7.99905646,0 L979.000944,0 C983.4187,0 987,3.58637817 987,8.00342045 L987,31 L0,31 L0,8.00342045 Z" id="path-1"></path>
                        <filter x="-0.1%" y="-1.6%" width="100.1%" height="103.2%" filterUnits="objectBoundingBox" id="filter-2">
                            <feOffset dx="0" dy="-1" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
                            <feComposite in="shadowOffsetInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
                            <feColorMatrix values="0 0 0 0 0.905882353   0 0 0 0 0.905882353   0 0 0 0 0.905882353  0 0 0 1 0" type="matrix" in="shadowInnerInner1"></feColorMatrix>
                        </filter>
                        <circle id="path-3" cx="25" cy="25" r="25"></circle>
                        <circle id="path-5" cx="25" cy="25" r="25"></circle>
                        <filter x="-5.0%" y="-5.0%" width="110.0%" height="110.0%" filterUnits="objectBoundingBox" id="filter-6">
                            <feMorphology radius="3" operator="erode" in="SourceAlpha" result="shadowSpreadInner1"></feMorphology>
                            <feOffset dx="0" dy="0" in="shadowSpreadInner1" result="shadowOffsetInner1"></feOffset>
                            <feComposite in="shadowOffsetInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1" result="shadowInnerInner1"></feComposite>
                            <feColorMatrix values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 1 0" type="matrix" in="shadowInnerInner1"></feColorMatrix>
                        </filter>
                        <rect id="path-7" x="0" y="0" width="780" height="354" rx="4"></rect>
                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-8">
                            <stop stop-color="#FFFFFF" offset="0%"></stop>
                            <stop stop-color="#FCFBFC" offset="100%"></stop>
                        </linearGradient>
                        <path d="M0,4.00002553 C0,1.79087243 1.79447341,0 3.99922856,0 L776.000771,0 C778.209484,0 780,1.79642476 780,4.00002553 L780,40 L0,40 L0,4.00002553 Z" id="path-9"></path>
                    </defs>
                    <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Desktop" transform="translate(-19.000000, -332.000000)">
                            <g id="header">
                                <g id="web-UI" transform="translate(19.000000, 332.000000)">
                                    <g id="browser">
                                        <rect id="bg" fill="#FAFBFC" x="0" y="31" width="987" height="530"></rect>
                                        <g id="top">
                                            <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-1"></use>
                                            <use fill="black" fill-opacity="1" filter="url(#filter-2)" xlink:href="#path-1"></use>
                                        </g>
                                        <ellipse id="button" fill="#F3F4F6" cx="16.2206175" cy="15.5" rx="6.38994024" ry="6.5"></ellipse>
                                        <ellipse id="button" fill="#F3F4F6" cx="33.9158367" cy="15.5" rx="6.38994024" ry="6.5"></ellipse>
                                        <ellipse id="button" fill="#F3F4F6" cx="51.6110558" cy="15.5" rx="6.38994024" ry="6.5"></ellipse>
                                    </g>
                                    <g id="menu" transform="translate(0.000000, 31.000000)">
                                        <rect id="menu-bg" fill="#FFFFFF" x="0" y="0" width="986" height="68"></rect>
                                        <g id="menu-items" transform="translate(0.000000, 4.000000)">
                                            <g id="logo" fill-rule="nonzero" fill="#252E35">
                                                <g id="InvoiceappKC29aA">
                                                    <g id="svg2">
                                                        <g id="g10" transform="translate(69.000000, 30.477552) scale(-1, 1) rotate(-180.000000) translate(-69.000000, -30.477552) translate(0.000000, 0.977552)">
                                                            <polygon id="path14" points="48.9875708 24.5642806 46.637393 24.5642806 46.637393 38.7724792 48.9875708 38.7724792"></polygon>
                                                            <g id="g16" transform="translate(0.000000, -0.000000)">
                                                                <g id="g18-Clipped">
                                                                    <g id="g18" transform="translate(6.802663, 4.647443)">
                                                                        <g id="g24" transform="translate(43.680295, 19.916820)">
                                                                            <path d="M8.57441728,0 L6.3758667,0 L6.36641734,5.83376893 C6.36641734,6.42267891 6.17209305,6.94021118 5.78414441,7.38548885 C5.39558332,7.83067884 4.9057916,8.05384381 4.31468178,8.05384381 C3.74203319,8.05384381 3.25985346,7.85023318 2.86893003,7.44362574 C2.47739414,7.03640448 2.28201991,6.55140432 2.28201991,5.98757299 L2.28201991,0 L0.0455844021,0 L0.0455844021,6.00537358 C0.0455844021,7.14145424 0.456019009,8.11557588 1.27802565,8.9264232 C2.10011978,9.73727052 3.1135634,10.1432642 4.31949395,10.1432642 C5.28367842,10.1432642 6.16911825,9.83635752 6.97528846,9.22377188 C8.04131601,8.41292457 8.57441728,7.28868173 8.57441728,5.85218333 L8.57441728,0 Z"
                                                                                  id="path26"></path>
                                                                        </g>
                                                                        <g id="g28" transform="translate(51.931483, 19.775871)">
                                                                            <path d="M9.90870161,10.084075 L6.51909446,1.07575159 C6.23298891,0.369954022 5.71239928,0.0166606457 4.95723811,0.0166606457 C4.5953627,0.0166606457 4.26839742,0.11881671 3.97642976,0.321813524 C3.69093666,0.525424152 3.49075027,0.815144012 3.37648303,1.1902716 L0.0152239637,10.084075 L2.42402276,10.084075 L4.99512303,3.27144931 L7.54732458,10.084075 L9.90870161,10.084075 Z"
                                                                                  id="path30"></path>
                                                                        </g>
                                                                        <g id="g32" transform="translate(61.072731, 19.758824)">
                                                                            <path d="M8.04945296,5.37086604 C8.04945296,6.21143946 7.78347104,6.88873855 7.25159468,7.40276331 C6.71980582,7.91678807 6.04277683,8.17380045 5.2206827,8.17380045 C4.30330755,8.17380045 3.5771069,7.85268843 3.04225575,7.21046438 C2.589824,6.6583832 2.36356437,6.01914053 2.36356437,5.29370094 C2.36356437,4.42647049 2.56375077,3.71655161 2.96534848,3.16447043 C3.47465136,2.45157017 4.25229851,2.0953831 5.29706501,2.0953831 C6.11915914,2.0953831 6.77186479,2.3459066 7.25640686,2.84695359 C7.78469595,3.41201255 8.04945296,4.25311209 8.04945296,5.37086604 M10.3237734,5.21592203 C10.3237734,3.95988473 9.92103827,2.81959506 9.11556801,1.7939131 C8.18331886,0.601975433 6.982113,0.00596275576 5.51090048,0.00596275576 C3.89987247,0.00596275576 2.58921154,0.509377318 1.57760529,1.51664488 C0.565999035,2.52338632 0.0607208734,3.782405 0.0607208734,5.29370094 C0.0666704691,5.30624027 0.0761198269,5.31272915 0.0891564409,5.31272915 L0.117592008,5.31272915 L0.0891564409,5.2551184 C0.0891564409,6.66311833 0.624620051,7.86400013 1.6965972,8.85828993 C2.71117825,9.79496897 3.8655748,10.2633085 5.15908689,10.2633085 C6.48400935,10.2633085 7.64785525,9.83942658 8.65001215,8.99175047 C9.76591131,8.04209367 10.3237734,6.7836011 10.3237734,5.21592203"
                                                                                  id="path34"></path>
                                                                        </g>
                                                                        <path d="M74.8770614,19.9168373 L72.6785108,19.9168373 L72.6785108,29.7942327 L74.8770614,29.7942327 L74.8770614,19.9168373 Z M75.0488122,31.6847775 C75.0488122,31.2959707 74.9315702,30.9837151 74.6976111,30.7480985 C74.463652,30.5123942 74.1729092,30.3948928 73.8257328,30.3948928 C73.4650823,30.3948928 73.1618279,30.5189707 72.9154447,30.7676528 C72.6560248,31.0027433 72.5263586,31.330958 72.5263586,31.7512447 C72.5263586,32.101469 72.6554124,32.3940826 72.9148322,32.6304007 C73.161303,32.8529518 73.4520457,32.9645782 73.7873229,32.9645782 C74.1219002,32.9645782 74.41868,32.8463753 74.6780124,32.6113725 C74.9250956,32.3626027 75.0488122,32.0539423 75.0488122,31.6847775 L75.0488122,31.6847775 Z"
                                                                              id="path36"></path>
                                                                        <g id="g38" transform="translate(76.282338, 19.926237)">
                                                                            <path d="M6.84640972,0 L4.86046968,0.0284984729 C3.34008551,0.0284984729 2.12059338,0.587682354 1.20199331,1.70657624 C0.403522575,2.66587868 0.00498715943,3.73373838 0.00498715943,4.91024303 C0.00498715943,6.26361359 0.423121243,7.40802457 1.2594769,8.34242373 C2.15261621,9.35916155 3.35250966,9.86792506 4.86046968,9.86792506 L6.84640972,9.86792506 L6.84640972,7.74044829 L5.09801604,7.74044829 C4.44767274,7.74044829 3.85533799,7.52973497 3.32057433,7.10953595 C2.62639651,6.57411541 2.2793076,5.82500017 2.2793076,4.86219022 C2.2793076,4.19260764 2.51510407,3.59071989 2.98652203,3.05529935 C3.54683396,2.43017439 4.27889671,2.1180065 5.1839352,2.1180065 L6.84640972,2.1180065 L6.84640972,0 Z"
                                                                                  id="path40"></path>
                                                                        </g>
                                                                        <g id="g42" transform="translate(83.118756, 19.661245)">
                                                                            <path d="M10.2368043,4.91050609 C10.2368043,3.74049033 9.80799595,2.67859339 8.95037923,1.7252537 C7.94708492,0.618811455 6.63869884,0.0655903314 5.02530848,0.0655903314 C3.69093666,0.0655903314 2.52822818,0.555851752 1.53797048,1.53768991 C0.534063705,2.49988604 0.0323728,3.65981773 0.0323728,5.0173096 C0.0323728,6.74414168 0.590847346,8.10163355 1.70910885,9.08934678 C2.66148163,9.93702289 3.78271793,10.3609048 5.07273026,10.3609048 C6.19029181,10.3609048 7.13977728,10.0990696 7.92101169,9.57671451 C8.69568404,9.04129397 9.38513719,8.19958061 9.98867117,7.05218825 L3.23955484,3.27276462 L2.28779452,5.10280502 L6.84247249,7.66652764 C6.65821001,7.83278335 6.4302005,7.96922526 6.15774402,8.07488883 C5.88528754,8.1805524 5.52402459,8.23342803 5.07386768,8.23342803 C4.19848967,8.23342803 3.52329806,7.92590759 3.04829284,7.3115682 C2.55368895,6.696615 2.30669324,5.95398864 2.30669324,5.0838645 C2.30669324,4.34062432 2.55430141,3.68770239 3.04951776,3.12439719 C3.59495569,2.50348123 4.29622053,2.19297941 5.15322479,2.19297941 C6.03516485,2.19297941 6.70440687,2.44885185 7.16173829,2.96112286 C7.56149862,3.40929423 7.87245249,4.15840947 8.09512486,5.20846859 L10.2368043,4.91050609 Z"
                                                                                  id="path44"></path>
                                                                        </g>
                                                                        <g id="g46" transform="translate(93.767264, 19.985409)" fill-opacity="0.511011096">
                                                                            <path d="M7.87446485,0.197297118 L7.87446485,5.61796972 C7.87446485,6.34279549 7.59964603,6.94705081 7.05000838,7.43082335 C6.49389618,7.90153043 5.74818435,8.13723472 4.81357287,8.13723472 C4.07433561,8.13723472 3.42644214,7.92055864 2.8708549,7.48782029 C2.13765473,6.92688266 1.7715796,6.08630924 1.7715796,4.9656616 C1.7715796,3.94646852 2.08725815,3.12492331 2.71861524,2.50049985 C3.29913829,1.92702289 3.99681588,1.64089822 4.81121053,1.64089822 C5.70732463,1.64089822 6.50273308,2.07723176 7.19752336,2.94981116 L7.19752336,0.881085092 C6.69408257,0.558219316 6.35408068,0.355222502 6.17813014,0.273234587 C5.75885863,0.0964563681 5.25130562,0.0073657575 4.65485866,0.0073657575 C3.44245355,0.0073657575 2.38876266,0.442471672 1.49378598,1.31382344 C0.516564894,2.26058655 0.0279106032,3.478129 0.0279106032,4.9656616 C0.0279106032,6.34454925 0.437732752,7.46940589 1.25746454,8.34084535 C2.14710408,9.29409735 3.38024528,9.77076719 4.95627567,9.77076719 C6.42398843,9.77076719 7.59378393,9.33504746 8.46434976,8.46422182 C9.25862079,7.66942133 9.65601878,6.67162403 9.65601878,5.4702161 L9.65601878,0.20676738 L7.87446485,0.197297118 Z"
                                                                                  id="path48"></path>
                                                                        </g>
                                                                        <g id="g50" transform="translate(104.933351, 15.965827)" fill-opacity="0.511011096">
                                                                            <path d="M-2.84217094e-14,0 L-2.84217094e-14,8.90388749 C-2.84217094e-14,10.5326848 0.528289098,11.7893359 1.58556725,12.6738409 C2.45797046,13.4181333 3.4961749,13.7903672 4.69974311,13.7903672 C6.30420907,13.7903672 7.56167361,13.2246067 8.47257421,12.0932612 C9.21767357,11.1649125 9.59022325,10.1290588 9.59022325,8.98526159 C9.59022325,7.77070052 9.29108108,6.71590627 8.69349669,5.81956353 C7.89870071,4.62411836 6.71228133,4.02696575 5.13502602,4.02696575 C4.66422052,4.02696575 4.2347997,4.06484679 3.84746353,4.14095964 C3.44411594,4.21689711 2.97147306,4.40332096 2.43014735,4.70128346 L2.43014735,6.50107163 C3.12843739,6.16329896 3.48375075,5.98818681 3.49678736,5.97564748 C3.95761854,5.76554797 4.4349861,5.66049821 4.92775261,5.66049821 C5.82447917,5.66049821 6.53878063,5.97213997 7.06943206,6.59665112 C7.58713438,7.22046077 7.84655425,8.01648889 7.84655425,8.98526159 C7.84655425,9.96578443 7.5338505,10.7488348 6.90835551,11.3352895 C6.28881011,11.908065 5.56567176,12.1948034 4.73824049,12.1948034 C3.9612058,12.1948034 3.29423862,11.908065 2.73873888,11.3352895 C2.07535896,10.6537814 1.743669,9.70885974 1.743669,8.4990338 L1.743669,0 L-2.84217094e-14,0 Z"
                                                                                  id="path52"></path>
                                                                        </g>
                                                                        <g id="g54" transform="translate(115.639456, 15.965827)" fill-opacity="0.511011096">
                                                                            <path d="M-8.52651283e-14,0 L-8.52651283e-14,8.90388749 C-8.52651283e-14,10.5326848 0.528289098,11.7893359 1.58556725,12.6738409 C2.45797046,13.4181333 3.4961749,13.7903672 4.69974311,13.7903672 C6.30420907,13.7903672 7.56167361,13.2246067 8.47257421,12.0932612 C9.21767357,11.1649125 9.59022325,10.1290588 9.59022325,8.98526159 C9.59022325,7.77070052 9.29108108,6.71590627 8.69349669,5.81956353 C7.89861321,4.62411836 6.71228133,4.02696575 5.13502602,4.02696575 C4.66422052,4.02696575 4.2347997,4.06484679 3.84746353,4.14095964 C3.44411594,4.21689711 2.97147306,4.40332096 2.43014735,4.70128346 L2.43014735,6.50107163 C3.12843739,6.16329896 3.48375075,5.98818681 3.49678736,5.97564748 C3.95761854,5.76554797 4.4349861,5.66049821 4.92775261,5.66049821 C5.82447917,5.66049821 6.53878063,5.97213997 7.06943206,6.59665112 C7.58713438,7.22046077 7.84655425,8.01648889 7.84655425,8.98526159 C7.84655425,9.96578443 7.53376301,10.7488348 6.90835551,11.3352895 C6.28881011,11.908065 5.56567176,12.1948034 4.73824049,12.1948034 C3.9611183,12.1948034 3.29423862,11.908065 2.73873888,11.3352895 C2.07535896,10.6537814 1.743669,9.70885974 1.743669,8.4990338 L1.743669,0 L-8.52651283e-14,0 Z"
                                                                                  id="path56"></path>
                                                                        </g>
                                                                        <g id="g58" transform="translate(12.086394, 12.403772)">
                                                                            <path d="M6.6495481,27.8846596 C4.18431563,27.8846596 2.17868944,25.8745965 2.17868944,23.4039105 L2.17868944,6.66338139 C2.17868944,4.19269533 4.18431563,2.18271996 6.6495481,2.18271996 L19.0809658,2.18271996 C21.5463732,2.18271996 23.5519994,4.19269533 23.5519994,6.66338139 L23.5519994,22.9633679 L18.6413956,27.8846596 L6.6495481,27.8846596 Z M19.0809658,0.0552431936 L6.6495481,0.0552431936 C3.01382018,0.0552431936 0.0559961945,3.01969819 0.0559961945,6.66338139 L0.0559961945,23.4039105 C0.0559961945,27.0476814 3.01382018,30.0121364 6.6495481,30.0121364 L19.5206234,30.0121364 L25.6746927,23.8445407 L25.6746927,6.66338139 C25.6746927,3.01969819 22.7166937,0.0552431936 19.0809658,0.0552431936 L19.0809658,0.0552431936 Z"
                                                                                  id="path60"></path>
                                                                        </g>
                                                                        <g id="g62" transform="translate(29.349985, 33.933009)">
                                                                            <path d="M6.73704215,0 L5.25734271,0 C2.37528858,0 0.0305354248,2.35002792 0.0305354248,5.23845775 L0.0305354248,6.56017308 L2.15322867,6.56017308 L2.15322867,5.23845775 C2.15322867,3.52293737 3.54569654,2.12738908 5.25734271,2.12738908 L6.73704215,2.12738908 L6.73704215,0 Z"
                                                                                  id="path64"></path>
                                                                        </g>
                                                                        <g id="g66" transform="translate(20.834005, 3.963497)">
                                                                            <polygon id="path68" points="8.39942918 0 6.27664844 0 6.27664844 4.71084141 0.00953685188 4.71084141 0.00953685188 9.62424119 2.13231759 9.62424119 2.13231759 6.83823049 8.39942918 6.83823049"></polygon>
                                                                        </g>
                                                                        <g id="g70" transform="translate(23.768565, 0.023290)">
                                                                            <polygon id="path72" points="2.99667135 0 0.0063870643 3.44068639 0.0063870643 13.0580003 2.12908031 13.0580003 2.12908031 4.23732832 4.59728757 1.39730205"></polygon>
                                                                        </g>
                                                                        <g id="g74" transform="translate(19.770795, 23.044286)">
                                                                            <path d="M4.02472648,0 C2.89867801,0 1.65188774,0.174673717 0.273506413,0.575493777 C0.174638132,0.604255312 0.098955775,0.627404841 0.048734188,0.638891918 C0.0557337123,0.637225853 0.11934189,0.623371211 0.213572986,0.623371211 L0.213572986,2.75084798 C0.410609595,2.75084798 0.572036125,2.70393511 0.865228699,2.61861506 C2.36452681,2.18263227 6.9276917,0.855392624 10.1626968,5.44180532 L11.8960415,4.21365267 C10.4379531,2.14641729 7.97280817,0 4.02472648,0"
                                                                                  id="path76"></path>
                                                                        </g>
                                                                        <g id="g78" transform="translate(28.180864, 25.498767)">
                                                                            <path d="M3.58725621,0 C2.1056319,1.48507734 0.380774123,3.15745542 0.0589709923,3.38588164 C0.0622957664,3.38360176 0.137978123,3.33037538 0.261869703,3.28898683 L0.933474061,5.30711715 C1.199281,5.2182896 1.47427481,5.12639299 5.08839169,1.5044563 L3.58725621,0 Z"
                                                                                  id="path80"></path>
                                                                        </g>
                                                                        <polygon id="path82" points="23.2695686 28.7837207 19.9338578 28.7837207 19.9338578 36.3816766 23.2695686 36.3816766"></polygon>
                                                                        <polygon id="path84" points="28.8796873 32.2787734 26.0492547 32.2787734 26.0492547 34.4062501 28.8796873 34.4062501"></polygon>
                                                                        <polygon id="path86" points="13.0095784 26.504369 5.73164798 26.504369 5.73164798 28.631758 13.0095784 28.631758"></polygon>
                                                                        <path d="M2.14316685,27.416057 L5.07448014,27.416057 L5.07448014,30.4552219 L2.14316685,30.4552219 L2.14316685,27.416057 Z M7.19726087,25.2886679 L0.0203861129,25.2886679 L0.0203861129,32.5826986 L5.07456763,32.5826986 L5.07456763,35.6724592 L7.19726087,35.6724592 L7.19726087,25.2886679 Z"
                                                                              id="path88"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="item" transform="translate(168.000000, 21.000000)" fill="#6B6E74">
                                                <text id="Dashboard" font-family="Lato-Regular, Lato" font-size="16" font-weight="normal">
                                                    <tspan x="30" y="16">Dashboard</tspan>
                                                </text>
                                                <g id="icon" fill-rule="nonzero">
                                                    <path d="M10,20 C4.4771525,20 6.76353751e-16,15.5228475 0,10 C-6.76353751e-16,4.4771525 4.4771525,1.01453063e-15 10,0 C15.5228475,3.38176876e-16 20,4.4771525 20,10 C20,15.5228475 15.5228475,20 10,20 Z M4.4,15.71 C7.77888937,13.4093414 12.2211106,13.4093414 15.6,15.71 C17.9211533,13.4348147 18.6350439,9.98142057 17.4062522,6.97238556 C16.1774604,3.96335056 13.2502647,1.99685726 10,1.99685726 C6.74973528,1.99685726 3.82253955,3.96335056 2.59374785,6.97238556 C1.36495614,9.98142057 2.07884672,13.4348147 4.4,15.71 Z M10.52,8.07 L13.54,5.05 L14.95,6.46 L11.93,9.48 C12.1659554,10.3545801 11.7846297,11.2785498 11.0005298,11.7321493 C10.2164299,12.1857488 9.2253607,12.0557054 8.58482763,11.4151724 C7.94429456,10.7746393 7.81425118,9.78357013 8.26785069,8.9994702 C8.72145019,8.21537026 9.64541995,7.83404459 10.52,8.07 L10.52,8.07 Z"
                                                          id="Shape"></path>
                                                </g>
                                            </g>
                                            <g id="item" transform="translate(305.000000, 21.000000)" fill="#6B6E74">
                                                <text id="Client" font-family="Lato-Regular, Lato" font-size="16" font-weight="normal">
                                                    <tspan x="30" y="16">Clients</tspan>
                                                </text>
                                                <g id="user-group" transform="translate(0.000000, 1.000000)" fill-rule="nonzero">
                                                    <path d="M7,8 C4.790861,8 3,6.209139 3,4 C3,1.790861 4.790861,3.66080864e-16 7,-3.97360096e-17 C9.209139,9.55453165e-17 11,1.790861 11,4 C11,6.209139 9.209139,8 7,8 L7,8 Z M7,9 C9.15,9 11.2,9.4 13.1,10.09 L12,16 L10.75,16 L10,20 L4,20 L3.25,16 L2,16 L0.9,10.09 C2.85466365,9.37539672 4.91881648,9.00655629 7,9 L7,9 Z M15.31,9.17 C16.63,9.35 17.9,9.65 19.11,10.09 L18,16 L16.75,16 L16,20 L12.04,20 L12.41,18 L13.66,18 L15.31,9.17 L15.31,9.17 Z M13,0 C14.600301,-0.0137201584 16.0547518,0.927723735 16.6975026,2.39333721 C17.3402534,3.85895069 17.0475756,5.56660506 15.9534574,6.73453351 C14.8593392,7.90246196 13.174397,8.30583979 11.67,7.76 C13.450955,5.56966985 13.450955,2.43033015 11.67,0.24 C12.1,0.1 12.53,0 13,0 Z"
                                                          id="Shape"></path>
                                                </g>
                                            </g>
                                            <g id="item" transform="translate(414.000000, 21.000000)" fill="#6B6E74">
                                                <g id="layers" transform="translate(0.000000, 2.000000)" fill-rule="nonzero">
                                                    <path d="M10,0 L20,6 L10,12 L0,6 L10,0 Z M16.67,10 L20,12 L10,18 L0,12 L3.33,10 L10,14 L16.67,10 Z" id="Shape"></path>
                                                </g>
                                                <text id="Invoices" font-family="Lato-Regular, Lato" font-size="16" font-weight="normal">
                                                    <tspan x="30" y="16">Invoices</tspan>
                                                </text>
                                            </g>
                                        </g>
                                        <g id="user-" transform="translate(904.000000, 9.000000)">
                                            <g id="Group-2">
                                                <mask id="mask-4" fill="white">
                                                    <use xlink:href="#path-3"></use>
                                                </mask>
                                                <use id="Oval-2" fill="#C5C5C5" xlink:href="#path-3"></use>
                                                <circle id="Oval-3" fill="#FFFFFF" mask="url(#mask-4)" cx="25" cy="25" r="9"></circle>
                                                <ellipse id="Oval-6" fill="#FFFFFF" mask="url(#mask-4)" cx="25.5" cy="42" rx="13.5" ry="10"></ellipse>
                                            </g>
                                            <g id="Oval-2">
                                                <use fill="black" fill-opacity="1" filter="url(#filter-6)" xlink:href="#path-5"></use>
                                                <use stroke="#D3E0E9" stroke-width="2" xlink:href="#path-5"></use>
                                            </g>
                                        </g>
                                    </g>
                                    <path d="M0.5,99.5 L986.5,99.5" id="Line" stroke="#E7E7E7" stroke-linecap="square"></path>
                                    <g id="table" transform="translate(103.000000, 160.000000)">
                                        <g>
                                            <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-7"></use>
                                            <rect stroke="#DEDEDE" stroke-width="1" x="0.5" y="0.5" width="779" height="353" rx="4"></rect>
                                        </g>
                                        <g id="table-top">
                                            <use fill="url(#linearGradient-8)" fill-rule="evenodd" xlink:href="#path-9"></use>
                                            <path stroke="#DEDEDE" stroke-width="1" d="M779.5,39.5 L0.5,39.5 L0.5,4.00002553 C0.5,2.06843525 2.0691947,0.5 3.99922856,0.5 L776.000771,0.5 C777.931297,0.5 779.5,2.07052003 779.5,4.00002553 L779.5,39.5 Z"></path>
                                        </g>
                                        <text id="Invoice-overview" font-family="Lato-Regular, Lato" font-size="15" font-weight="normal" fill="#3D3D3D">
                                            <tspan x="15" y="26">Invoice overview</tspan>
                                        </text>
                                        <g id="client" transform="translate(20.000000, 87.000000)">
                                            <text id="Zemlak-Ltd" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Zemlak Ltd</tspan>
                                            </text>
                                            <text id="$5.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$5.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 118.000000)">
                                            <text id="Flatley,-Hackett-and" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Flatley, Hackett and bogan</tspan>
                                            </text>
                                            <text id="$5.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$5.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 147.000000)">
                                            <text id="Miller-Lesch" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Miller-Lesch</tspan>
                                            </text>
                                            <text id="$55.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$55.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 178.000000)">
                                            <text id="Harvey,-O’Connell-an" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Harvey, O’Connell and Greenholt</tspan>
                                            </text>
                                            <text id="$5.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$5.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 210.000000)">
                                            <text id="Miller-Lesch" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Miller-Lesch</tspan>
                                            </text>
                                            <text id="$10.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$10.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 241.000000)">
                                            <text id="Carroll-Rice" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Carroll-Rice</tspan>
                                            </text>
                                            <text id="$13.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$13.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 270.000000)">
                                            <text id="TDC-Group" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">TDC Group</tspan>
                                            </text>
                                            <text id="$5.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$5.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="client" transform="translate(20.000000, 301.000000)">
                                            <text id="Telenor-AS" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="0" y="24">Telenor AS</tspan>
                                            </text>
                                            <text id="$23.00,-" font-family="Lato-Regular, Lato" font-size="14" font-weight="normal" line-spacing="9" fill="#6B6E74">
                                                <tspan x="395" y="24">$23.00,-</tspan>
                                            </text>
                                            <text id=".-.-." font-family="Lato-Black, Lato" font-size="16" font-weight="700" fill="#95A5A6">
                                                <tspan x="696" y="16">. . .</tspan>
                                            </text>
                                            <g id="button" transform="translate(540.000000, 6.000000)">
                                                <rect id="Rectangle" fill="#95A5A6" x="0" y="0" width="56" height="17" rx="3"></rect>
                                                <text id="Created" font-family="Lato-Regular, Lato" font-size="10" font-weight="normal" line-spacing="9" fill="#FFFFFF">
                                                    <tspan x="10" y="14">Created</tspan>
                                                </text>
                                            </g>
                                            <path d="M0.5,30.5 L738.499358,31.4736139" id="Line" stroke="#DEDEDE" stroke-linecap="square"></path>
                                        </g>
                                        <g id="table-header" transform="translate(20.000000, 63.000000)" font-size="12" font-family="Lato-Bold, Lato" fill="#3D3D3D" font-weight="bold">
                                            <text id="Client">
                                                <tspan x="0" y="12">Client</tspan>
                                            </text>
                                            <text id="Amount">
                                                <tspan x="395" y="12">Amount</tspan>
                                            </text>
                                            <text id="Status">
                                                <tspan x="540" y="12">Status</tspan>
                                            </text>
                                        </g>
                                        <text id="Create-invoice" font-family="Lato-Bold, Lato" font-size="15" font-weight="bold" fill="#3498DB">
                                            <tspan x="671" y="26">Create invoice</tspan>
                                        </text>
                                    </g>
                                    <g id="line" transform="translate(123.000000, 242.000000)" stroke="#DEDEDE" stroke-linecap="square">
                                        <path d="M0.5,1.5 L738.499358,2.47361393" id="Line"></path>
                                        <path d="M0.5,2.5 L738.499358,3.47361393" id="Line"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </div><!-- /#webUI -->

        </div><!-- /.col-md-12 -->
    </div><!-- /.container-fluid -->
</div><!-- /.row -->

<div class="row">
    <div class="feature-wrapper container">
        <h2 class="text-center text-uppercase">All of the features</h2>

        <div class="col-md-5">
            <div class="icon-feature">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="heroicon-photos heroicon heroicon-sm">
                        <path class="heroicon-photos-edge heroicon-component-accent heroicon-component-fill" d="M9 16h50v36H9V16zm4 4v28h42V20H13zm38-4h-4v-4H5v28h4v4H1V8h50v8z"></path>
                        <path class="heroicon-photos-back-background heroicon-component-fill" d="M7 12H5v28h4V16h38v-4H7z"></path>
                        <polygon class="heroicon-photos-front-ground heroicon-component-fill" points="14 41 14 47 54 47 54 41 41 41 40.586 41"></polygon>
                        <polygon class="heroicon-photos-front-sky heroicon-component-fill" points="54 21 14 21 14 39 26.293 26.707 27 26 27.707 26.707 36 35 42.293 28.707 43 28 43.707 28.707 54 39"></polygon>
                        <path class="heroicon-photos-front-sun heroicon-component-fill" d="M38 27a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"></path>
                        <path class="heroicon-photos-front-mountains heroicon-component-fill" d="M41 40l-4.3-4.3 6.3-6.29L53.59 40H41zm-26.59 0L27 27.41 39.59 40H14.4z"></path>
                        <path class="heroicon-shadows" d="M8 14H7v31h2V16h42v-2H8z"></path>
                        <path class="heroicon-outline"
                              d="M8 45H0V7h52v8h8v38H8v-8zM2 9v34h6v-2H4V11h44v4h2V9H2zm6 30V15h38v-2H6v26h2zm2-22v34h48V17H10zm4 2h42v30H12V19h2zm40 2H14v18l12.3-12.3.7-.7.7.7L36 35l6.3-6.3.7-.7.7.7L54 39V21zm-18 9a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm2-3a2 2 0 1 0-4 0 2 2 0 0 0 4 0zM14 41v6h40v-6H14zm27-1h12.59L43 29.41l-6.3 6.3L41 40zm-26.59 0H39.6L27 27.41 14.41 40zM49 42v1H33v-1h16z"></path>
                    </svg>
                </div>
                <div class="description">
                    <h3 class="text-headline">Intuitive design</h3>
                    <p class="text-description">Invoiceapp has a simple and intuitive design that is really easy to get started with and get started with creating beautiful invoices.</p>
                </div><!-- /.description -->
        </div><!-- col-md-4 -->

        <div class="col-md-5 col-md-offset-2">
            <h3 class="icon-feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="heroicon-bell heroicon heroicon-sm">
                    <path class="heroicon-bell-bowl heroicon-component-fill" d="M50.7 48c-.34-.3-.66-.64-.95-1l-.68-1A7.96 7.96 0 0 1 48 42V24a18 18 0 0 0-36 0V42.01A7.98 7.98 0 0 1 9.3 48h41.4z"></path>
                    <path class="heroicon-bell-lip heroicon-component-accent heroicon-component-fill" d="M2 51v-1h56v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"></path>
                    <path class="heroicon-bell-top heroicon-component-accent heroicon-component-fill" d="M32 4.1V4a2 2 0 1 0-4 .1 20.24 20.24 0 0 1 4 0z"></path>
                    <path class="heroicon-bell-clapper heroicon-component-accent heroicon-component-fill" d="M26 54a4 4 0 0 0 8 0h-8z"></path>
                    <rect class="heroicon-shadows" width="10" height="3" x="25" y="53"></rect>
                    <path class="heroicon-outline"
                          d="M26 4a4 4 0 1 1 7.98.4A20 20 0 0 1 50 24v18a6 6 0 0 0 6 6h4v3a3 3 0 0 1-3 3H36a6 6 0 0 1-12 0H3a3 3 0 0 1-3-3v-3h4a6 6 0 0 0 6-6V24A20 20 0 0 1 26.02 4.4 4.02 4.02 0 0 1 26 4zm6 .1V4a2 2 0 1 0-4 .1 20.24 20.24 0 0 1 4 0zM50.7 48c-.34-.3-.66-.64-.95-1H34v-1h15.07A7.96 7.96 0 0 1 48 42V24a18 18 0 0 0-36 0V42.01A7.98 7.98 0 0 1 9.3 48h41.4zM26 54a4 4 0 0 0 8 0h-8zM2 51a1 1 0 0 0 1 1h54a1 1 0 0 0 1-1v-1H2v1zm15.74-33.77A14 14 0 0 1 30 10v1a13 13 0 0 0-11.35 6.66l-.9-.43zm-1.12 2.62l.98.23c-.3.93-.49 1.91-.56 2.92h-1c.07-1.09.27-2.14.58-3.15zM17 25v8h-1v-8h1z"></path>
                </svg>
            </h3><!-- icon-feature -->
            <div class="description">
                <h3 class="text-headline">Notifications</h3>
                <p class="text-description">Get notifications when your customer is missing a due date or when the customer has paid your invoices with our notification system.</p>
            </div><!-- /.description -->
        </div><!-- col-md-4 -->

        <div class="col-md-5">
            <div class="icon-feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="heroicon-clock heroicon heroicon-sm">
                    <path class="heroicon-clock-edge heroicon-component-accent heroicon-component-fill" d="M30 59a29 29 0 1 1 0-58 29 29 0 0 1 0 58zm0-5a24 24 0 1 0 0-48 24 24 0 0 0 0 48z"></path>
                    <circle class="heroicon-clock-background heroicon-component-fill" cx="30" cy="30" r="25"></circle>
                    <path class="heroicon-shadows" d="M55 29.5A25 25 0 0 0 5 29a25 25 0 1 1 50 .5zm3 0v.5a28 28 0 1 1-56-.5 28 28 0 0 0 56 0z"></path>
                    <path class="heroicon-outline"
                          d="M30 60a30 30 0 1 1 0-60 30 30 0 0 1 0 60zm28-30a28 28 0 1 0-56 0 28 28 0 0 0 56 0zM30 55a25 25 0 1 1 0-50 25 25 0 0 1 0 50zm24-25a24 24 0 1 0-48 0 24 24 0 0 0 48 0zM29 8h2v4h-2V8zm23 21v2h-4v-2h4zM29 52v-4h2v4h-2zM8 31v-2h4v2H8zm36.44-16.85l1.4 1.41-13.2 14.34.9.8L31 33.25V46h-2V33.24l-2.54-2.53.94-.87-8.71-9.74 1.41-1.41 8.9 7.96V24h2v2.53l13.44-12.38zM31 30a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"></path>
                </svg>
            </div><!-- icon-feature -->
            <div class="description">
                <h3 class="text-headline">Past Due Notices</h3>
                <p class="text-description">The customer and you will both get a notification then an invoice is past due date.</p>
            </div><!-- /.description -->
        </div><!-- col-md-4 -->

        <div class="col-md-5 col-md-offset-2">
            <div class="icon-feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="heroicon-envelope-open heroicon heroicon-sm">
                    <path class="heroicon-envelope-open-body heroicon-component-fill" d="M28.44 1.25a2.61 2.61 0 0 1 3.12 0L60 24v34a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V24L28.44 1.25z"></path>
                    <polygon class="heroicon-envelope-open-document heroicon-component-fill" points="12 8 48 8 48 34 38 42 22.5 42 12 34"></polygon>
                    <path class="heroicon-envelope-open-sides heroicon-component-accent heroicon-component-fill" d="M1 25l4 4v26l-4 4V25zm58 34l-4-4V29l4-4v34z"></path>
                    <polygon class="heroicon-shadows" points="3 26 22 38 38 38 57 26 38 42 22 42"></polygon>
                    <path class="heroicon-outline" fill-rule="nonzero"
                          d="M20 8l8.44-6.75a2.61 2.61 0 0 1 3.12 0L40 8h8v6.4L60 24v34a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V24l12-9.6V8h8zm3.2 0h13.6L30.3 2.8c-.13-.1-.49-.1-.62 0L23.2 8zM12 16.96L3.2 24H12v-7.04zM12 26H3.52L12 32.72V26zM2 27.34V56.4l2-1.6V28.93l-2-1.59zM3.2 58h53.6L38.05 43h-16.1L3.2 58zM58 56.4V27.34l-2 1.6V54.8l2 1.6zM56.48 26H48v6.72L56.48 26zM48 24h8.8L48 16.96V24zM14 10v24.3l4.65 3.7H39v1H19.91l2.52 2h15.14L46 34.3V10H14zm41 19.72L39.76 41.81 55 54V29.72zM5 54l15.24-12.2L5 29.73V54zm13-38h24v1H18v-1zm0 2h23v1H18v-1zm22 2v1H18v-1h22zm-22 2h24v1H18v-1zm14 2v1H18v-1h14zm-14 3h22v1H18v-1zm24 2v1H18v-1h24zm-24 2h23v1H18v-1zm18 2v1H18v-1h18zm-18 3h24v1H18v-1z"></path>
                </svg>
            </div><!-- icon-feature -->
            <div class="description">
                <h3 class="text-headline">Send Invoices by email</h3>
                <p class="text-description">We automatic send invoices to your customer's email address when you create a new invoice.</p>
            </div><!-- /.description -->
        </div><!-- col-md-4 -->

        <div class="col-md-5">
            <div class="icon-feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="heroicon-currency heroicon heroicon-sm">
                    <rect class="heroicon-currency-background heroicon-component-fill" width="58" height="37" x="1" y="12"></rect>
                    <path class="heroicon-currency-decorative heroicon-component-accent heroicon-component-fill"
                          d="M56 35a4 4 0 0 0-4 4H8a4 4 0 0 0-4-4V19a4 4 0 0 0 4-4h44a4 4 0 0 0 4 4v16zm-2-1.66V20.66A6.02 6.02 0 0 1 50.34 17H9.66A6.02 6.02 0 0 1 6 20.66v12.68c1.7.6 3.06 1.96 3.66 3.66h40.68A6.02 6.02 0 0 1 54 33.34zM30 34a7 7 0 1 1 0-14 7 7 0 0 1 0 14zm0-4a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-15-1a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm30 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path>
                    <rect class="heroicon-shadows" width="58" height="7" x="1" y="42"></rect>
                    <path class="heroicon-outline"
                          d="M0 47V11h60v39H0v-3zm2-6h56V13H2v28zm0 2v1h14v1H2v1h20v1H2v1h56v-1H41v-1h17v-1H47v-1h11v-1H2zm49-28h1a4 4 0 0 0 4 4v16a4 4 0 0 0-4 4H8a4 4 0 0 0-4-4V19a4 4 0 0 0 4-4h43zm.1 1H8.9A5 5 0 0 1 5 19.9v14.2A5 5 0 0 1 8.9 38h42.2a5 5 0 0 1 3.9-3.9V19.9a5 5 0 0 1-3.9-3.9zM54 33.34A6.02 6.02 0 0 0 50.34 37H9.66A6.02 6.02 0 0 0 6 33.34V20.66A6.02 6.02 0 0 0 9.66 17h40.68A6.02 6.02 0 0 0 54 20.66v12.68zM7 21.33v11.34A7.02 7.02 0 0 1 10.33 36h39.34A7.02 7.02 0 0 1 53 32.67V21.33A7.02 7.02 0 0 1 49.67 18H10.33A7.02 7.02 0 0 1 7 21.33zM37 27a7 7 0 1 1-14 0 7 7 0 0 1 14 0zm-7 6a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm0-2a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm3-4a3 3 0 1 0-6 0 3 3 0 0 0 6 0zm-16 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-2 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm30 1a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm1-2a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"></path>
                </svg>
            </div><!-- icon-feature -->
            <div class="description">
                <h3 class="text-headline">No Fees</h3>
                <p class="text-description">There are no hidden feeds (besides Stripe’s standard fees), we take a fast price every 3 months and it’s only $5,- </p>
            </div><!-- /.description -->
        </div><!-- col-md-4 -->

        <div class="col-md-5 col-md-offset-2">
            <div class="icon-feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" class="heroicon-heart heroicon heroicon-sm">
                    <path class="heroicon-heart-outer heroicon-component-accent heroicon-component-fill" d="M31.41 9.97L30 11.37l-1.4-1.41-1.28-1.27A16 16 0 0 0 4.7 31.3L30.13 56.5 55.31 31.3A16 16 0 0 0 32.7 8.7L31.4 9.97z"></path>
                    <path class="heroicon-heart-inner heroicon-component-fill" d="M31.4 15.63l-1.41 1.41-1.41-1.41-1.42-1.43-2.67-2.69A12 12 0 0 0 7.5 28.48l22.6 22.37L52.5 28.5A12 12 0 0 0 35.5 11.5l-4.11 4.12z"></path>
                    <path class="heroicon-outline"
                          d="M31.41 9.97l1.28-1.28A16 16 0 0 1 55.3 31.3L30.13 56.5 4.7 31.3A16 16 0 0 1 27.3 8.7l1.27 1.27L30 11.38l1.42-1.41zM53.9 29.9a14 14 0 0 0-19.8-19.8L30 14.21l-1.41-1.42-2.68-2.69A14 14 0 0 0 6.1 29.9l24.02 23.77L53.9 29.9zM31.4 15.63l4.11-4.12A12 12 0 0 1 52.5 28.5L30.12 50.85 7.5 28.48A12 12 0 0 1 24.49 11.5l2.67 2.69 1.42 1.43 1.4 1.41 1.42-1.4zm19.67-2.7a10 10 0 0 0-14.14 0l-6.95 6.95-4.24-4.27c-1.1-1.12-2-2.01-2.67-2.68A10 10 0 0 0 8.91 27.06l21.2 20.97 20.96-20.96a10 10 0 0 0 0-14.14zm-40.73 1.41A7.97 7.97 0 0 1 16 12v1a6.98 6.98 0 0 0-6.26 3.87l-.9-.45a8 8 0 0 1 1.5-2.08zm-2 3.36l.95.29c-.2.65-.3 1.33-.3 2.01H8c0-.77.12-1.55.35-2.3zm1.98 7.94a7.92 7.92 0 0 1-2.17-4.07l.98-.2a6.9 6.9 0 0 0 1.9 3.55L16 29.85v1.4l-5.68-5.61z"></path>
                </svg>
            </div><!-- icon-feature -->
            <div class="description">
                <h3 class="text-headline">Secure Online Payments</h3>
                <p class="text-description">With Invoiceapp your customers will alway be secure when they pay your invoices.</p>
            </div><!-- /.description -->
        </div><!-- col-md-4 -->
    </div><!-- /.feature-wrapper -->
</div><!-- /.row -->

<div class="row feature-soft-bg">
    <div class="feature-wrapper container">

        <h2 class="text-center text-uppercase">Start your free trial</h2>

        <div class="col-md-6">
            <h3 class="text-headline text-lg">Simple chart overview</h3>
            <p class="text-description" class="text-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia, urna in varius imperdiet, ex tellus
                lacinia mauris, sit amet consequat imperdiet
                sem magna tincidunt lectus imperdiet,
                Suspendisse elit eros, tristique.</p>
            <br/>
            <button class="btn btn-action">Start your free trial</button>
        </div><!-- /.col-md-6 -->

        <div class="col-md-4 col-md-offset-2">
            <svg width="242px" height="242px" viewBox="0 0 242 242" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Desktop" transform="translate(-682.000000, -1601.000000)">
                        <g id="section" transform="translate(0.000000, 1462.000000)">
                            <g id="Group" transform="translate(41.000000, 50.000000)">
                                <g id="features" transform="translate(0.000000, 89.000000)">
                                    <g id="text">
                                        <g id="icon" transform="translate(641.000000, 0.000000)">
                                            <path d="M123.42,4.84 L123.42,9.68 L118.58,9.68 L118.58,4.84 L123.42,4.84 Z M168.412882,159.72 L163.42381,159.72 L158.43498,159.72 L153.44615,159.72 L128.26,159.72 L123.42,159.72 L118.58,159.72 L113.74,159.72 L88.55385,159.72 L83.564778,159.72 L78.575948,159.72 L73.586876,159.72 L53.24,159.72 L53.24,154.88 L188.76,154.88 L188.76,159.72 L168.412882,159.72 Z M164.63381,164.56 L182.78381,237.16 L177.794738,237.16 L159.64498,164.56 L164.63381,164.56 Z M118.58,164.56 L123.42,164.56 L123.42,212.96 L118.58,212.96 L118.58,164.56 Z M77.365948,164.56 L82.354778,164.56 L64.20502,237.16 L59.21619,237.16 L77.365948,164.56 Z"
                                                  id="heroicon-chart-stand-heroicon-component-accent-heroicon-component-fill" fill="#2ECC71"></path>
                                            <polygon id="heroicon-chart-poster-heroicon-component-fill" fill="#FFFFFF" points="191.18 157.3 239.58 157.3 239.58 12.1 2.42 12.1 2.42 157.3 50.82 157.3 50.82 152.46 191.18 152.46"></polygon>
                                            <polygon id="heroicon-chart-stripe-heroicon-component-accent-heroicon-component-fill" fill="#2ECC71" points="4.84 26.62 237.16 26.62 237.16 29.04 4.84 29.04"></polygon>
                                            <path d="M87.34385,164.56 L84.3188878,176.66 L69.3519567,176.66 L72.376876,164.56 L87.34385,164.56 Z M169.622882,164.56 L172.647842,176.66 L157.681074,176.66 L154.65615,164.56 L169.622882,164.56 Z M128.26,164.56 L128.26,183.92 L113.74,183.92 L113.74,164.56 L128.26,164.56 Z"
                                                  id="heroicon-shadows" fill="#000000" opacity="0.200000003"></path>
                                            <path d="M113.74,9.68 L113.74,4.84 L113.74,0 L118.58,0 L123.42,0 L128.26,0 L128.26,4.84 L128.26,9.68 L237.16,9.68 L242,9.68 L242,14.52 L242,154.88 L242,159.72 L237.16,159.72 L193.6,159.72 L193.6,164.56 L188.76,164.56 L169.622882,164.56 L187.77264,237.16 L188.98264,242 L183.99381,242 L174.015666,242 L154.65615,164.56 L128.26,164.56 L128.26,212.96 L128.26,217.8 L123.42,217.8 L118.58,217.8 L113.74,217.8 L113.74,212.96 L113.74,164.56 L87.34385,164.56 L67.984092,242 L58.00619,242 L53.01736,242 L54.22736,237.16 L72.376876,164.56 L53.24,164.56 L48.4,164.56 L48.4,159.72 L4.84,159.72 L0,159.72 L0,154.88 L0,14.52 L0,9.68 L4.84,9.68 L113.74,9.68 Z M123.42,4.84 L118.58,4.84 L118.58,9.68 L123.42,9.68 L123.42,4.84 Z M168.412882,159.72 L188.76,159.72 L188.76,154.88 L53.24,154.88 L53.24,159.72 L73.586876,159.72 L78.575948,159.72 L83.564778,159.72 L88.55385,159.72 L113.74,159.72 L118.58,159.72 L123.42,159.72 L128.26,159.72 L153.44615,159.72 L158.43498,159.72 L163.42381,159.72 L168.412882,159.72 Z M164.63381,164.56 L159.64498,164.56 L177.794738,237.16 L182.78381,237.16 L164.63381,164.56 Z M118.58,164.56 L118.58,212.96 L123.42,212.96 L123.42,164.56 L118.58,164.56 Z M77.365948,164.56 L59.21619,237.16 L64.20502,237.16 L82.354778,164.56 L77.365948,164.56 Z M4.84,14.52 L4.84,24.2 L237.16,24.2 L237.16,14.52 L4.84,14.52 Z M4.84,26.62 L4.84,29.04 L237.16,29.04 L237.16,26.62 L4.84,26.62 Z M237.16,154.88 L237.16,31.46 L4.84,31.46 L4.84,154.88 L48.4,154.88 L48.4,150.04 L53.24,150.04 L188.76,150.04 L193.6,150.04 L193.6,154.88 L237.16,154.88 Z M89.54,110.028204 L66.99286,123.556488 L43.1849,118.794896 L22.6978334,140.36 L225.06,140.36 L225.06,142.78 L19.36,142.78 L16.94,142.78 L16.94,140.370648 L16.94,140.36 L16.94,140.348626 L16.94,50.82 L19.36,50.82 L19.36,136.846402 L41.5151,113.525104 L66.10714,118.443512 L90.192674,103.99224 L114.126232,106.38562 L138.861052,84.124282 L163.455996,98.881442 L185.970708,87.624086 L210.282996,56.01816 L221.874796,52.154146 C223.142876,51.731614 224.51308,52.416716 224.935854,53.684796 C225.358386,54.952634 224.673284,56.32308 223.405446,56.745854 L213.217004,60.14184 L189.129292,91.455914 L188.76,91.64056 L188.76,99.22 L186.34,99.22 L186.34,92.85056 L163.244004,104.398558 L140.36,90.668204 L140.36,99.22 L137.94,99.22 L137.94,91.464626 L116.16,111.066868 L116.16,118.58 L113.74,118.58 L113.74,111.2111 L91.96,109.0331 L91.96,118.58 L89.54,118.58 L89.54,110.028204 Z M212.96,70.18 L212.96,79.86 L210.54,79.86 L210.54,70.18 L212.96,70.18 Z M210.54,89.54 L212.96,89.54 L212.96,99.22 L210.54,99.22 L210.54,89.54 Z M210.54,108.9 L212.96,108.9 L212.96,118.58 L210.54,118.58 L210.54,108.9 Z M210.54,128.26 L212.96,128.26 L212.96,137.94 L210.54,137.94 L210.54,128.26 Z M140.36,108.9 L140.36,118.58 L137.94,118.58 L137.94,108.9 L140.36,108.9 Z M140.36,128.26 L140.36,137.94 L137.94,137.94 L137.94,128.26 L140.36,128.26 Z M89.54,128.26 L91.96,128.26 L91.96,137.94 L89.54,137.94 L89.54,128.26 Z M43.56,128.26 L43.56,137.94 L41.14,137.94 L41.14,128.26 L43.56,128.26 Z M65.34,128.26 L67.76,128.26 L67.76,137.94 L65.34,137.94 L65.34,128.26 Z M113.74,128.26 L116.16,128.26 L116.16,137.94 L113.74,137.94 L113.74,128.26 Z M164.56,108.9 L164.56,118.58 L162.14,118.58 L162.14,108.9 L164.56,108.9 Z M162.14,128.26 L164.56,128.26 L164.56,137.94 L162.14,137.94 L162.14,128.26 Z M188.76,108.9 L188.76,118.58 L186.34,118.58 L186.34,108.9 L188.76,108.9 Z M188.76,128.26 L188.76,137.94 L186.34,137.94 L186.34,128.26 L188.76,128.26 Z M159.72,41.14 L159.72,45.98 L82.28,45.98 L82.28,41.14 L159.72,41.14 Z"
                                                  id="heroicon-outline" fill="#4A4A4A" fill-rule="nonzero"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div><!-- /.col-md-6 -->
    </div><!-- /.feature-wrapper -->
</div><!-- /.row -->

<div class="row footer">
    <footer class="container">
        <div class="col-md-12">
            <p class="text-center">© 2017 Invoiceapp.io all rights reserved.</p>
        </div><!-- /.col-md-12 -->
    </footer>
</div><!-- /.row -->

</body>
</html>
