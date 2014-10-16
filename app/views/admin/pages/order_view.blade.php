@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Order Details View 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>  </a></li>
            <li><a href="#"></a></li>
            <li class="active"></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title"> </h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                          <input type="button" value="GO BACK" class="btn btn-submit m10" onclick="window.history.go(-1);" >   

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="listingTables" class="table table-bordered table-striped">

                            <tbody>

                                <tr >
                                    <td>id</td>
                                    <td>{{ $orders_view[0]['id']; }} </td>
                                </tr>
                                <tr >
                                    <td>Customer</td>
                                    <td>{{ $orders_view[0]['fname']; }} {{ $orders_view[0]['lname']; }} </td>
                                </tr>

                                <tr >
                                    <td>Listing</td>
                                    <td>{{ $orders_view[0]['city']; }} {{ $orders_view[0]['service']; }}  {{ $orders_view[0]['category']; }} {{ $orders_view[0]['package']; }} </td>
                                </tr>
                                <tr>
                                    <td>Locality</td>
                                    <td>{{ $orders_view[0]['locality']; }} </td>
                                </tr>

                                <tr>
                                    <td>Pick up time</td>
                                    <td>{{ $orders_view[0]['pickup_time']; }} </td>
                                </tr>

                                <tr>
                                    <td>Instructions</td>
                                    <td>{{ $orders_view[0]['instructions']; }} </td>
                                </tr>

                                <tr>
                                    <td>Cost</td>
                                    <td>{{ $orders_view[0]['cost']; }} </td>
                                </tr>
                                <tr>
                                    <td>Mode</td>
                                    <td>{{ $orders_view[0]['mode']; }} </td>
                                </tr>
                                <tr>
                                    <td>Txn Ref No.</td>
                                    <td>{{ $orders_view[0]['txn_ref_no']; }} </td>
                                </tr>

                                <tr>
                                    <td>Txn Status</td>
                                    <td>{{ $orders_view[0]['txn_status']; }} </td>
                                </tr>
                                <tr>
                                    <td>Txn Message</td>
                                    <td>{{ $orders_view[0]['txn_message']; }} </td>
                                </tr>

                                <tr>
                                    <td>Booking Status</td>
                                    <td data-value="{{ $orders_view[0]['booking_status']; }}">{{ Helper::booking_status($orders_view[0]['booking_status']) }}</td>
                                </tr>


                                <tr>
                                    <td>Vendors Name</td>
                                    <td>{{ $orders_view[0]['venders_name']; }} </td>
                                </tr>
                                <tr>
                                    <td>Drivers</td>
                                    <td>{{ $orders_view[0]['drivers']; }} </td>
                                </tr>

                                <tr>
                                    <td>Cars</td>
                                    <td>{{ $orders_view[0]['cars']; }} </td>
                                </tr>

                                <tr>
                                    <td>Start Date</td>
                                    <td>{{ $orders_view[0]['start_date']; }} </td>
                                </tr>

                                <tr>
                                    <td>End Date</td>
                                    <td>{{ $orders_view[0]['end_date']; }} </td>
                                </tr>

                                <tr>
                                    <td>Start Km</td>
                                    <td>{{ $orders_view[0]['stat_km']; }} </td>
                                </tr>

                                <tr>
                                    <td>End Km</td>
                                    <td>{{ $orders_view[0]['end_km']; }} </td>
                                </tr>

                                <tr>
                                    <td>Discount</td>
                                    <td>{{ $orders_view[0]['discount']; }} </td>
                                </tr>
                                <tr>
                                    <td>Service tax</td>
                                    <td>{{ $orders_view[0]['service_tax']; }} </td>
                                </tr>
                                <tr>
                                    <td>Extras</td>
                                    <td>{{ $orders_view[0]['extras']; }} </td>
                                </tr>
                                
                                    <tr>
                                    <td>Readings</td>
                                    <td>{{$orders_view[0]['readings'];}}
                                     
                                        </td>
                                </tr>
                                       <tr>
                                    <td>Toll</td>
                                    <td>{{ $orders_view[0]['toll']; }} </td>
                                </tr>
                                   <tr>
                                    <td>Parking</td>
                                    <td>{{ $orders_view[0]['parking']; }} </td>
                                </tr>
                                       <tr>
                                    <td>Permit</td>
                                    <td>{{ $orders_view[0]['permit']; }} </td>
                                </tr>
                                    
                                
                                <tr>
                                    <td>Remarks</td>
                                    <td>{{ $orders_view[0]['remarks']; }} </td>
                                </tr>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop          