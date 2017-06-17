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
                        <h1>${{ money_format('%i', $all_time) }},-</h1>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-3 -->

            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">This week</div>

                    <div class="panel-body">
                        <h1>${{ money_format('%i', $this_week) }},-</h1>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-3 -->


            <div class="col-md-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">Today</div>

                    <div class="panel-body">
                        <h1>${{ money_format('%i', $today) }},-</h1>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-3 -->

        </div><!-- row -->

        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading text-center">Statitics</div><!-- /.panel-heading -->--}}
                    {{--<div class="panel-body">--}}
                        {{--Panel body ...--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- /.panel panel-default -->--}}
            {{--</div><!-- /.col-md-12 -->--}}
        {{--</div><!-- /.row -->--}}
        
    </div><!-- container -->
</home>
@endsection
