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
        
        
          <div class="row">
                        <div class="col-md-6">
                            <!-- AREA CHART -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Local Sales</h3>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="local-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- DONUT CHART -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Outstation Sales</h3>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="outstation-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col (LEFT) -->
                        <div class="col-md-6">
                            <!-- LINE CHART -->
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Airport Sales</h3>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="airport-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            <!-- BAR CHART -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Service wise sales</h3>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="service-chart" style="height: 300px;"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- /.col (RIGHT) -->
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
                        xLabels : "Months",
                          xLabelAngle: 60
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
                          xLabelAngle: 60,
                        barSizeRatio : 0.2
                        
                });
                
                
          // LINE CHART
                var line = new Morris.Line({
                    element: 'local-chart',
                    resize: true,
                    data: {{ Helper::service_local_summary() }},
                    xkey: 'y',
                    ykeys: ['item1'],
                    labels: ['Item 1'],
                    lineColors: ['#3c8dbc'],
                      xLabelAngle: 60,
                  parseTime : false,
                    hideHover: 'auto'
                });
     
     
     
                //DONUT CHART
                var donut = new Morris.Donut({
                    element: 'service-chart',
                    resize: true,
                    colors: ["#3c8dbc", "#f56954", "#00a65a"],
                    data: {{ Helper::all_service_summary() }},
                    hideHover: 'auto'
                });
                
                
                      // AREA CHART
                var area = new Morris.Area({
                element: 'airport-chart',
                        resize: true,
                        data: {{ Helper::service_airport_summary() }},
                        xkey: 'month',
                        ykeys: ['sale'],
                        labels: ['sale'],
                        lineColors: ['#a0d0e0'],
                        hideHover: 'auto',
                        parseTime : false,
                          xLabelAngle: 60,
                        xLabels : "Months"
                });
                
               
                           var bar = new Morris.Bar({
                element: 'outstation-chart',
                        resize: true,
                        data:  {{ Helper::service_outstation_summary() }},
                        barColors: ['#00a65a'],
                        xkey: 'month',
                        ykeys: ['sale'],
                        labels: ['sale'],
                        hideHover: 'auto',
                        parseTime : false,
                        xLabelAngle: 60,
                        barSizeRatio : 0.1
                        
                });
                
        });
</script>









@stop