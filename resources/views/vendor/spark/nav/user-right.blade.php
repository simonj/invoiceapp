<!-- Right Side Of Navbar -->
<li>
@if(Auth::user()->stripe_id)
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
            <span class="label label-success">Stripe connected <span class="caret"></span></span>
        </a>
        <ul role="menu" class="dropdown-menu">
            <li class="dropdown-header">Actions</li>
            <li>
                <a href="/stripe/disconnect">
                    <i class="fa fa-fw fa-btn fa fa-times"></i> Disconnect stripe
                </a>
            </li>
        </ul>
    </li>
@else
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
            <span class="label label-warning">Stripe Disconnected <span class="caret"></span></span>
        </a>
        <ul role="menu" class="dropdown-menu">
            <li class="dropdown-header">Actions</li>
            <li>
                <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id={{ env('STRIPE_CLIENT_ID') }}&scope=read_only">
                    <i class="fa fa-fw fa-btn fa fa-plug"></i> Connect stripe
                </a>
            </li>
        </ul>
    </li>
@endif
