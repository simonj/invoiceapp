@extends('spark::layouts.app')

@section('content')
<home :user="user" inline-template>
    <div class="container">
        <!-- Application Dashboard -->
        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">All time</div>

                    <div class="panel-body">
                        <h1>$45,321</h1>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">This week</div>

                    <div class="panel-body">
                        <h1>$1,500</h1>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-3 -->


            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">Today</div>

                    <div class="panel-body">
                        <h1>$449</h1>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-3 -->

        </div><!-- row -->
    </div><!-- container -->
</home>
@endsection
