@extends('admin.layouts.default')
@section('content')

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sales Summary 
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Charts</a></li>
            <li class="active">Morris</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Sales Graph</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="revenue-chart" style="height: 300px;"></div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <div class="row">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Bookings Graph</h3>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->


<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


{{ HTML::script('public/admin/js/plugins/morris/morris.min.js'); }}




<script type="text/javascript">
        $(function() {
        "use strict";
                // AREA CHART
                var area = new Morris.Area({
                element: 'revenue-chart',
                        resize: true,
                        data: {{ Helper::sales_summary() }},
                        xkey: 'month',
                        ykeys: ['sales'],
                        labels: ['Sales'],
                        lineColors: ['#a0d0e0'],
                        hideHover: 'auto',
                        parseTime : false,
                        xLabels : "Months"
                });
                //BAR CHART
                var bar = new Morris.Bar({
                element: 'bar-chart',
                        resize: true,
                        data:  {{ Helper::booking_summary() }},
                        barColors: ['#00a65a'],
                        xkey: 'month',
                        ykeys: ['bookings'],
                        labels: ['Bookings'],
                        hideHover: 'auto',
                        parseTime : false,
                        xLabels : "Months",
                        barSizeRatio : 0.1
                        
                });
        });
</script>









@stop