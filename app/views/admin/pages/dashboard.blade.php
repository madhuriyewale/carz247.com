@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Home
            <small> </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> </li>
        </ol>



    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            {{ Helper::all_orders() }} 
                        </h3>
                        <p>
                            Orders
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ URL::route('orders'); }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"> </i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            {{ Helper::all_venders() }}<sup style="font-size: 20px"></sup>
                        </h3>
                        <p>
                         Venders
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ URL::route('venders'); }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            {{ Helper::all_users() }}
                        </h3>
                        <p>
                            User Registrations
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ URL::route('users'); }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            {{ Helper::all_enquiries() }}
                        </h3>
                        <p>
                           Enquiries
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ URL::route('contact_enquiries'); }}" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop