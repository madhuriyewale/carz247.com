@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Order</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Orders</h3>
                        {{ View::make('admin.includes.addButton',array("name"=>"Orders")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="orderForm" role="form" method="post" action="{{ URL::route('save_order'); }}" enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Customer</label>
                                <select class="form-control" name="customer">

                                    <option value="">Please Select</option>
                                    @foreach ($customers as $customer)
                                    <option  value="{{ $customer->id }}" >{{ $customer->fname }} {{ $customer->lname }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Listing</label>
                                <select class="form-control" name="listing">

                                    <option value="">Please Select</option>
                                    @foreach ($listings as $listing)
                                    <option  value="{{ $listing->id }}" >{{ $listing->city }} {{ $listing->service }} {{ $listing->category }} {{ $listing->package }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label >Start Date</label>
                                <input type="text" name="startDate" id="startDate" class="form-control datepicker" name="date" placeholder="Please Select" autocomplete="off" />

                            </div>
                            <div class="form-group">
                                <label >End Date</label>
                                <input type="text" name="endDate" id="endDate" class="form-control datepicker" name="date" placeholder="Please Select" autocomplete="off" />

                            </div>


                            <div class="form-group">
                                <label>Locality</label>
                                <select class="form-control" name="locality">

                                    <option value="">Please Select</option>
                                    @foreach ($localities as $locality)
                                    <option  value="{{ $locality->id }}" >{{ $locality->locality }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="label_title"><strong>Pickup time</strong></label>
                                <input type="text" name="pickuptime" value="" class="form-control" placeholder="Hours:Mins"> 
                            </div>

                            <div class="form-group">
                                <label class="label_title"><strong>Prepaid Booking Amount</strong></label>
                                <input type="text" name="cost" value="" class="form-control" placeholder="Cost"> 
                            </div>

                            <div class="form-group">
                                <label class="label_title"><strong>Payment Mode</strong></label>
                                <select name="mode" class="form-control">
                                    <option value="">Please Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Card">Card</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>

                            <!--
                            <div class="form-group">
                                                            <label class="label_title"><strong>txn ref no</strong></label>
                                                            <input type="text" name="txn_ref_no" value=""class="form-control" placeholder="txn ref no"> 
                                                        </div>
                            -->

                            <!--                            <div class="form-group">
                                                            <label class="label_title"><strong>txn status</strong></label>
                                                            <input type="text" name="txn_status" value="" class="form-control" placeholder="txn status""> 
                                                        </div>
                            
                                                        <div class="form-group">
                                                            <label class="label_title"><strong>txn Message</strong></label>
                                                            <input type="text" name="txn_msg" value="" class="form-control" placeholder="txn  Message"> 
                                                        </div>-->
                            <div class="form-group">
                                <label class="label_title"><strong>Instructions</strong></label>
                                <textarea cols="30" rows="1" name="instructions" class="form-control"></textarea>
                            </div>
                            <div class="form-group  ">
                                <label>Booking Status</label>
                                <select class="form-control booking_status_select" id="bookingStatus" name="booking_status" placeholder="Please Select">
                                    <option value="">Please Select</option>
                                    <option value="0">Received</option>
                                    <option value="1">Confirmed</option>
                                    <option value="2">Allocated</option>
                                    <option value="3" class="completed" >Completed</option>
                                    <option value="4">Cancelled</option>
                                </select>

                            </div>

                            <div class="form-group ">
                                <label class="venderlabel" >Venders </label>
                                <select class="form-control select_vender_name" id="vendersName" name="vendersName" placeholder="Please Select">
                                    <option value="">Please Select</option>
                                    @foreach($venders as $vender)
                                    <option value="{{$vender->id}}">{{ $vender->venders_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group ">
                                <label class="driverlabel">Drivers </label>
                                <select class="form-control select_driver_name" id="venderDrivers" name="venderDrivers" placeholder="Please Select">
                                    <option> </option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label class="carlabel">Cars </label>
                                <select class="form-control select_car_name" id="vendersCars" name="vendersCars" placeholder="Please Select">
                                    <option> </option>
                                </select>
                            </div>



                            <div class="form-group start_km_div">
                                <label class="labelStartKm"><strong>Start Km</strong></label>
                                <input type="text" name="startKm" value="" class="form-control startkm" placeholder="Start Km"> 
                            </div>

                            <div class="form-group end_km_div">
                                <label class="labelStartKm"><strong>End Km</strong></label>
                                <input type="text" name="endKm" value="" class="form-control endkm" placeholder="End Km"> 
                            </div>



                            <div class="form-group extras_div">
                                <label class="labelExtras"><strong>Extras</strong></label>
                                <input type="text" name="extras" value="" class="form-control extras" placeholder="Extras"> 
                            </div>



                            <div class="form-group discount_div">
                                <label class="labelDiscount"><strong>Discount</strong></label>
                                <input type="text" name="discount" value="" class="form-control discount" placeholder="Discount"> 
                            </div>



                            <div class="form-group service_tax_div">
                                <label class="labelRemark"><strong>Service Tax</strong></label>
                                <input type="text" name="serviceTax" value="" class="form-control serviceTax" placeholder="Service Tax"> 
                            </div>

                            <div class="form-group upload_div">
                                <label class="labelUpload"><strong>Order Documents</strong></label>
                                <input type="file" name="uploadFile[]" class="form-control uploadFile" multiple="multiple"> 
                            </div>



                            <div class="form-group remark_div">
                                <label class="labelRemark"><strong>Remark</strong></label>
                                <input type="text" name="remark" value="" class="form-control remark" placeholder="Remark"> 
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="OrdersTables" class="table orderTable table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Customer</th>
                                    <th>Listing</th>
                                    <th>Locality</th>
                                    <th>Pickup time</th>
                                    <th>Instructions</th>
                                    <th>Amount Paid</th>
                                    <th>Mode</th>
                                    <th>txn ref no</th>
                                    <th>txn status</th>
                                    <th>txn msg</th>
                                    <th>Booking status</th>
                                    <th>Venders Name</th>
                                    <th>Drivers</th>
                                    <th>Cars</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Start Km</th>
                                    <th>End Km</th>
                                    <th>Discount</th>
                                    <th>Service Tax</th>
                                    <th>Order Upload</th>
                                    <th>Remark</th>
                                    <th>Extras</th>
                                    <th>Edit</th>
                                    <th>View</th>

                                    <th>Delete</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr data-tr="{{ $order->id }}">
                                    <td>{{ $order->id }}</td>
                                    <td data-value="{{$order->customer_id}}">{{ $order->fname }} {{ $order->lname }}</td>
                                    <td data-value="{{$order->listing_id}}"> {{ $order->city }} {{ $order->service }} {{ $order->category }} {{ $order->package }}</td>
                                    <td data-value="{{$order->locality_id}}">{{ $order->locality }}</td>
                                    <td>{{ $order->pickup_time }}</td>
                                    <td data-value="{{$order->id}}">{{ $order->instructions }}</td>
                                    <td>{{ $order->cost }}</td>
                                    <td>{{ $order->mode }}</td>
                                    <td>{{ $order->txn_ref_no }}</td>
                                    <td>{{ $order->txn_status }}</td>
                                    <td>{{ $order->txn_msg }}</td>
                                    <td>{{ $order->booking_status }}</td>
                                    <td data-value="{{$order->vender_id}}">{{ $order->venders_name }}</td>
                                    <td >{{ $order->drivers }}</td>
                                    <td>{{ $order->cars }}</td>
                                    <td>{{ $order->start_date }}</td>
                                    <td>{{ $order->end_date }}</td>
                                    <td>{{ $order->start_km }}</td>
                                    <td>{{ $order->end_km }}</td>
                                    <td>{{ $order->discount }}</td>
                                    <td>{{ $order->service_tax }}</td>                                    
                                    <td>
                                        <?php $orderUpload = json_decode($order->upload, true); ?>
                                        <ol>
                                            @foreach ($orderUpload as $upload)

                                            <li>  <a href="{{ URL::to("/public/admin/uploads/order-uploads/". $upload) }}" target="_blank">{{ $upload }} </a></li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td>{{ $order->remark }}</td>
                                    <td>{{ $order->extras }}</td>                                    
                                    <td><a href="javascript:void();" class="orderEdit" data-id="{{$order->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('order_view', 'View', $order->id) }}</td>
                                    <td>{{HTML::linkAction('order_delete', 'Delete', $order->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>
                                    <td>
                                        @if($order->booking_status == 3)
                                        {{HTML::linkAction('invoice', 'Generate Invoice', $order->id ,array('target' => '_blank')) }}</td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script>
    //order edit
    jQuery(document).ready(function($) {


        $("#startDate").datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            minDate: +1,
            onClose: function(selectedDate) {
                $("#endDate").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#endDate").datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            minDate: +1,
            onClose: function(selectedDate) {
                $("#startDate").datepicker("option", "maxDate", selectedDate);
            }
        });
        $(".select_vender_name").css("display", "none");
        $(".select_driver_name").css("display", "none");
        $(".select_car_name").css("display", "none");
        $(".completed").css("display", "none");
        $(".venderlabel").css("display", "none");
        $(".driverlabel").css("display", "none");
        $(".carlabel").css("display", "none");
        $(".start_date_div").hide();
        $(".end_date_div").hide();
        $(".start_km_div").hide();
        $(".end_km_div").hide();
        $(".discount_div").hide();
        $(".service_tax_div").hide();
        $(".upload_div").hide();
        $(".remark_div").hide();
        $(".extras_div").hide();

        $(document).on("click", ".orderEdit", function() {
            $("html, body").animate({scrollTop: 0}, "slow");
            var id = $(this).attr('data-id');
            $("form#orderForm select[name='customer'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);
            $("form#orderForm select[name='listing'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);
            $("form#orderForm select[name='locality'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(3).attr("data-value") + "']").prop('selected', true);
            $("form#orderForm input[name='pickuptime']").val($("tr[data-tr='" + id + "'] td").eq(4).text());
            $("form#orderForm textarea[name='instructions']").val($("tr[data-tr='" + id + "'] td").eq(5).text());
            $("form#orderForm input[name='cost']").val($("tr[data-tr='" + id + "'] td").eq(6).text());
            $("form#orderForm input[name='mode']").val($("tr[data-tr='" + id + "'] td").eq(7).text());
            $("form#orderForm input[name='txn_ref_no']").val($("tr[data-tr='" + id + "'] td").eq(8).text());
            $("form#orderForm input[name='txn_status']").val($("tr[data-tr='" + id + "'] td").eq(9).text());
            $("form#orderForm input[name='txn_msg']").val($("tr[data-tr='" + id + "'] td").eq(10).text());
            $("form#orderForm select[name='booking_status']").val($("tr[data-tr='" + id + "'] td").eq(11).text());
            $("form#orderForm select[name='vendersName'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(12).attr("data-value") + "']").prop('selected', true);
            $("form#orderForm input[name='startDate']").val($("tr[data-tr='" + id + "'] td").eq(15).text());
            $("form#orderForm input[name='endDate']").val($("tr[data-tr='" + id + "'] td").eq(16).text());
            $("form#orderForm input[name='startKm']").val($("tr[data-tr='" + id + "'] td").eq(17).text());
            $("form#orderForm input[name='endKm']").val($("tr[data-tr='" + id + "'] td").eq(18).text());
            $("form#orderForm input[name='discount']").val($("tr[data-tr='" + id + "'] td").eq(19).text());
            $("form#orderForm input[name='serviceTax']").val($("tr[data-tr='" + id + "'] td").eq(20).text());
            $("form#orderForm input[name='remark']").val($("tr[data-tr='" + id + "'] td").eq(22).text());
            $("form#orderForm input[name='extras']").val($("tr[data-tr='" + id + "'] td").eq(23).text());

            if ($("tr[data-tr='" + id + "'] td").eq(12).attr("data-value") != "") {
                getVendorDetails($("tr[data-tr='" + id + "'] td").eq(12).attr("data-value"), id);
            }
            $(".select_vender_name").css("display", "none");
            $(".select_driver_name").css("display", "none");
            $(".select_car_name").css("display", "none");
            $(".completed").css("display", "none");
            $(".venderlabel").css("display", "none");
            $(".driverlabel").css("display", "none");
            $(".carlabel").css("display", "none");
            if ($("tr[data-tr='" + id + "'] td").eq(11).text() == "1") {
                $(".select_vender_name").css("display", "block");
                $(".venderlabel").css("display", "block");
            } else if ($("tr[data-tr='" + id + "'] td").eq(11).text() == "2") {
                $(".select_vender_name").css("display", "block");
                $(".select_driver_name").css("display", "block");
                $(".select_car_name").css("display", "block");
                $(".completed").css("display", "block");
                $(".venderlabel").css("display", "block");
                $(".driverlabel").css("display", "block");
                $(".carlabel").css("display", "block");
            } else if ($("tr[data-tr='" + id + "'] td").eq(11).text() == "3") {
                $(".select_vender_name").css("display", "block");
                $(".venderlabel").css("display", "block");
                $(".select_driver_name").css("display", "block");
                $(".select_car_name").css("display", "block");
                $(".driverlabel").css("display", "block");
                $(".carlabel").css("display", "block");
                $(".completed").css("display", "block");
                $(".start_date_div").show();
                $(".end_date_div").show();
                $(".start_km_div").show();
                $(".end_km_div").show();
                $(".discount_div").show();
                $(".service_tax_div").show();
                $(".upload_div").show();
                $(".remark_div").show();
                $(".extras_div").show();
                //   $(".invoice").show();
            }
            else {
                $(".select_vender_name").css("display", "none");
                $(".select_vender_name").css("display", "none");
                $(".select_driver_name").css("display", "none");
                $(".venderlabel").css("display", "none");
                $(".driverlabel").css("display", "none");
                $(".carlabel").css("display", "none");
                $(".completed").css("display", "none");
            }
            $("form#orderForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#orderForm").attr("action", "{{ URL::route('order_edit') }}");
        });

        $(document).on("change", ".booking_status_select", function() {
            var value = $(this).val();
            if (value == "1") {
                $(".select_vender_name").css("display", "block");
                $(".venderlabel").css("display", "block");
            } else
            if (value == "2") {
                $(".select_vender_name").css("display", "block");
                $(".venderlabel").css("display", "block");
                $(".select_driver_name").css("display", "block");
                $(".select_car_name").css("display", "block");
                $(".driverlabel").css("display", "block");
                $(".carlabel").css("display", "block");
            } else if (value == "3") {
                $(".select_vender_name").css("display", "block");
                $(".venderlabel").css("display", "block");
                $(".select_driver_name").css("display", "block");
                $(".select_car_name").css("display", "block");
                $(".driverlabel").css("display", "block");
                $(".carlabel").css("display", "block");
                $(".completed").css("display", "block");
                $(".start_date_div").show();
                $(".end_date_div").show();
                $(".start_km_div").show();
                $(".end_km_div").show();
                $(".discount_div").show();
                $(".service_tax_div").show();
                $(".upload_div").show();
                $(".remark_div").show();
                $(".extras_div").show();
                //   $(".invoice").show();
            } else {
                $(".select_vender_name").css("display", "none");
                $(".select_driver_name").css("display", "none");
                $(".select_car_name").css("display", "none");
                $(".venderlabel").css("display", "none");
                $(".driverlabel").css("display", "none");
                $(".carlabel").css("display", "none");
            }
        });

        $(document).on("change", ".select_vender_name", function() {
            var value = $(this).val();
            getVendorDetails(value, "");
        });
        function getVendorDetails(vid, id) {
            $.get(document.location.origin + "/admin/drivers_dropdown/" + vid, function(data) {
                var jsonCont = data.split("======");
                var drivers = jQuery.parseJSON(jsonCont[0]);
                var driversOption = "<option value=''>Please Select</option>";
                $.each(drivers, function(index, value) {
                    driversOption += "<option value='" + $.trim(value) + "'>" + value + "</option>";
                });
                var cars = jQuery.parseJSON(jsonCont[1]);
                var carsOption = "<option value=''>Please Select</option>";
                $.each(cars, function(index, value) {
                    carsOption += "<option value='" + $.trim(value) + "'>" + value + "</option>";
                });
                $(".select_driver_name").empty().append(driversOption);
                $(".select_car_name").empty().append(carsOption);
                if (id != "") {
                    if ($("tr[data-tr='" + id + "'] td").eq(13).text() != "") {
                        $(".select_driver_name option[value='" + $("tr[data-tr='" + id + "'] td").eq(13).text() + "']").prop('selected', true);
                    }
                    if ($("tr[data-tr='" + id + "'] td").eq(14).text() != "") {
                        $(".select_car_name option[value='" + $("tr[data-tr='" + id + "'] td").eq(14).text() + "']").prop('selected', true);
                    }
                }
            });
        }
    });
</script>
@stop