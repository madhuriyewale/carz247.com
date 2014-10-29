@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order Master
        </h1>
        <head>
            <style>
                //    td:nth-child(6),th:nth-child(6) {
                //        display: none;
                //    }`


            </style>
        </head>
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
                            <div class="bb od-1">
                                <h4 class="box-title">Order Details</h4>
                                <div class="form-group col-sm-3">
                                    <label>Customer</label>
                                    <select class="form-control" name="customer" onchange="check(this);" required="true">

                                        <option value="">Please Select</option>
                                        <option value="0">Add New Customer </option>
                                        @foreach ($customers as $customer)
                                        <option  value="{{ $customer->id }}" >{{ $customer->fname }} {{ $customer->lname }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Listing</label>
                                    <select class="form-control listing_class" id="carz_Listing" name="listing"  required="true">

                                        <option value="">Please Select</option>
                                        @foreach ($listings as $listing)
                                        <option  value="{{ $listing->id }}" >{{ $listing->city }} {{ $listing->service }} {{ $listing->category }} {{ $listing->package }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 start_DATE_div ">
                                    <label  class="labelStart"  >Start Date</label>
                                    <input type="text" name="startDate[]" id="startDate" class="form-control datepicker" placeholder="Please Select" autocomplete="off" required="true"/>

                                </div>
                                <div class="form-group col-sm-3 end_DATE_div">
                                    <label  class="labelEnd" >End Date</label>
                                    <input type="text" name="endDate[]" id="endDate" class="form-control datepicker "  placeholder="Please Select" autocomplete="off" required="true"/>

                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Locality</label>
                                    <select class="form-control locality_class" id="locality_id" name="locality" required="true">

                                        <option ></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="label_title"><strong>Pickup time</strong></label>
                                    <input type="text" name="pickuptime" value="" class="form-control" placeholder="Hours:Mins" required="true"> 
                                </div>

                                <div class="form-group col-sm-3">
                                    <label class="label_title"><strong>Prepaid Booking Amount</strong></label>
                                    <input type="text" name="cost" value="" class="form-control" placeholder="Cost"> 
                                </div>

                                <div class="form-group col-sm-3">
                                    <label class="label_title"><strong>Payment Mode</strong></label>
                                    <select name="mode" class="form-control" required="true">
                                        <option value="">Please Select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Card">Card</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label class="label_title"><strong>Instructions</strong></label>
                                    <input type="text" name="instructions" class="form-control" placeholder="Instructions" />
                                </div>
                                <div class="form-group col-sm-3  ">
                                    <label>Booking Status</label>
                                    <select class="form-control booking_status_select" id="bookingStatus" name="booking_status" placeholder="Please Select" required="true">
                                        <option value="">Please Select</option>
                                        <option value="0" selected="selected">Received</option>
                                        <option value="1">Confirmed</option>
                                        <option value="2">Allocated</option>
                                        <option value="3" class="completed" >Completed</option>
                                        <option value="4">Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <h4 class="box-title">Carz Listing Details</h4>
                            <div class="form-group col-sm-2 carzListingDetails">
                                <label class="carzListingDetails"><strong>Min Kms</strong></label>
                                <input type="text" required="true" name="carzListingDetails[]" id="carzMinKm" value="" class="form-control carzListingDetails" placeholder="Min Kms"> 
                            </div>

                            <div class="form-group col-sm-2 carzListingDetails">
                                <label class="carzListingDetails"><strong>Min hrs</strong></label>
                                <input type="text" required="true" name="carzListingDetails[]" value="" id="carzMinHr" class="form-control carzListingDetails" placeholder="Min Hrs"> 
                            </div>

                            <div class="form-group col-sm-2 carzListingDetails">
                                <label class="carzListingDetails"><strong>Base Cost</strong></label>
                                <input type="text" required="true" name="carzListingDetails[]" value="" id="carzBaseCost" class="form-control carzListingDetails" placeholder="Base Cost"> 
                            </div>


                            <div class="form-group col-sm-2 carzListingDetails">
                                <label class="carzListingDetails"><strong>Extra Km Cost</strong></label>
                                <input type="text"  name="carzListingDetails[]" value="" id="carzExtraKmCost" class="form-control carzListingDetails" placeholder="Extra Km Cost"> 
                            </div>

                            <div class="form-group col-sm-2 carzListingDetails">
                                <label class="carzListingDetails"><strong>Extra Hr Cost</strong></label>
                                <input type="text" name="carzListingDetails[]" value=""   id="carzExtraHrCost" class="form-control carzListingDetails" placeholder="Extra Hr Cost"> 
                            </div>
                            <div class="form-group col-sm-2 carzListingDetails">
                                <label class="carzListingDetails"><strong>Driver Cost</strong></label>
                                <input type="text"  name="carzListingDetails[]" value="" id="carzDriverCost" class="form-control carzListingDetails" placeholder="Driver Cost"> 
                            </div>





                            <div class="bb od-2">
                                <h4 class="box-title">Vendor Allocation and  Listing Details</h4>
                                <div class="form-group col-sm-3 ">
                                    <label class="venderlabel" >Vendors </label>
                                    <select class="form-control select_vender_name"  required="true" id="vendersName" name="vendersName" placeholder="Please Select">
                                        <option value="">Please Select</option>
                                        @foreach($venders as $vender)
                                        <option value="{{$vender->id}}">{{ $vender->venders_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 venderListing_div ">
                                    <label class="venderListinglabel" >Vendor Listing </label>
                                    <select class="form-control select_venderListing"  required="true" id="venderListing" name="venderListing" placeholder="Please Select">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 ">
                                    <label class="driverlabel">Drivers </label>
                                    <select class="form-control select_driver_name" id="venderDrivers" name="venderDrivers" placeholder="Please Select">
                                        <option> </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-3 cardiv ">
                                    <label class="carlabel">Cars </label>
                                    <select class="form-control select_car_name" id="vendersCars" name="vendersCars" placeholder="Please Select">
                                        <option> </option>
                                    </select>
                                </div>



                                <div class="form-group col-sm-2 vendorListingDetails">
                                    <label class="vendorListingDetails"><strong>Min Kms</strong></label>
                                    <input type="text" required="true" name="vendorListingDetails[]" id="vendorMinKm" value="" class="form-control vendorListingDetails" placeholder="Min Kms"> 
                                </div>

                                <div class="form-group col-sm-2 vendorListingDetails">
                                    <label class="vendorListingDetails"><strong>Min hrs</strong></label>
                                    <input type="text" required="true" name="vendorListingDetails[]" value="" id="vendorMinHr" class="form-control vendorListingDetails" placeholder="Min Hrs"> 
                                </div>

                                <div class="form-group col-sm-2 vendorListingDetails">
                                    <label class="vendorListingDetails"><strong>Base Cost</strong></label>
                                    <input type="text" required="true" name="vendorListingDetails[]" value="" id="vendorBaseCost" class="form-control vendorListingDetails" placeholder="Base Cost"> 
                                </div>


                                <div class="form-group col-sm-2 vendorListingDetails">
                                    <label class="vendorListingDetails"><strong>Extra Km Cost</strong></label>
                                    <input type="text" name="vendorListingDetails[]" value="" id="vendorExtraKmCost" class="form-control vendorListingDetails" placeholder="Extra Km Cost"> 
                                </div>

                                <div class="form-group col-sm-2 vendorListingDetails">
                                    <label class="vendorListingDetails"><strong>Extra Hr Cost</strong></label>
                                    <input type="text"  name="vendorListingDetails[]" value=""   id="vendorExtraHrCost" class="form-control vendorListingDetails" placeholder="Extra Hr Cost"> 
                                </div>

                                <div class="form-group col-sm-2 vendorListingDetails">
                                    <label class="vendorListingDetails"><strong>Driver Cost</strong></label>
                                    <input type="text"  name="vendorListingDetails[]" value="" id="vendorDriverCost" class="form-control vendorListingDetails" placeholder="Driver Cost"> 
                                </div>


                                <div class="form-group col-sm-2 vendorPrepaidBookingAmt">
                                    <label class="vendorPrepaidBookingAmt"><strong>Advance Given</strong></label>
                                    <input type="text"  name="vendor_prepaid_booking_amt" value="" id="vendorPrepaidBookingAmt" class="form-control vendorPrepaidBookingAmt" placeholder="Prepaid Amount"> 
                                </div>

                                <div class="form-group col-sm-2 vendorExtraCharges">
                                    <label class="vendorExtraCharges"><strong> Extra Charges</strong></label>
                                    <input type="text"  name="vendor_extra_charges" value="" id="vendorExtraCharges" class="form-control vendorExtraCharges" placeholder="Vendor Extra Charges"> 
                                </div>


                                <div class="form-group col-sm-2 vendorRemarks">
                                    <label class="vendorRemarks"><strong> Remarks</strong></label>
                                    <input type="text"  name="vendor_remarks" value="" id="vendorRemarks" class="form-control vendorExtraCharges" placeholder="Vendor Remarks"> 
                                </div>

                                <div class="form-group col-sm-2 vendorDiscount">
                                    <label class="vendorDiscount"><strong> Discount(Rs.)</strong></label>
                                    <input type="text"  name="vendor_discount" value="" id="vendorDiscount" class="form-control vendorDiscount" placeholder="Vendor Discount"> 
                                </div>

                                <div class="form-group col-sm-2 vendorServiceTax">
                                    <label class="vendorServiceTax"><strong> Service Tax (%)</strong></label>
                                    <input type="text"  name="vendor_service_tax" value="" id="vendorServiceTax" class="form-control vendorServiceTax" placeholder="Vendor Service Tax"> 
                                </div>




                            </div>




                            <div class="clearfix "></div>

                            <div class="bb od-3">
                                <h4 class="box-title">Order Completion Summary</h4> 

                                <div class="readingz"></div>


                                <div class="form-group col-sm-6  startkm1div">
                                    <label class="labelStartKm"><strong>Start Km</strong></label>
                                    <input type="text" name="startKm[]" value=""  required="true" class="form-control startkm" placeholder="Start Km"> 
                                </div>

                                <div class="form-group col-sm-6  endkm1div">
                                    <label class="labelStartKm"><strong>End Km</strong></label>
                                    <input type="text" name="endKm[]"  required="true" value="" class="form-control endkm" placeholder="End Km"> 
                                </div>





                                <div class="clearfix "></div>


                                <div class="form-group col-sm-2 toll_div">
                                    <label class="labelToll"><strong>Toll</strong></label>
                                    <input type="text"  name="toll" value="" class="form-control toll" placeholder="Toll"> 
                                </div>

                                <div class="form-group col-sm-2 permit_div ">
                                    <label class="labelPermit"><strong>Permit</strong></label>
                                    <input type="text"  name="permit" value="" class="form-control permit" placeholder="Permit"> 
                                </div>

                                <div class="form-group col-sm-2 parking_div">
                                    <label class="labelParking"><strong>Parking</strong></label>
                                    <input type="text"  name="parking" value="" class="form-control Parking" placeholder="Parking"> 
                                </div>

                                <div class="form-group col-sm-2 extras_div">
                                    <label class="labelExtras"><strong>Extra Charges</strong></label>
                                    <input type="text" name="extraHrs[]" value="" class="form-control extras" placeholder="Extra Charges"> 
                                </div>

                                <div class="form-group col-sm-2 extras_div"> 
                                    <label class="labelExtrasCharges"><strong>Extra Remarks</strong></label>
                                    <input type="text" name="extraRemark" value="" class="form-control extraRemark" placeholder="Extra Charges Remark"> 
                                </div>
                                <div class="clearfix "></div>
                                <div class="form-group col-sm-2 discount_div">
                                    <label class="labelDiscount"><strong>Discount(Rs.)</strong></label>
                                    <input type="text" name="discount"  value="" class="form-control discount" placeholder="Discount"> 
                                </div>

                                <div class="form-group col-sm-2 service_tax_div">
                                    <label class="labelRemark"><strong>Service Tax(%)</strong></label>
                                    <input type="text"  name="serviceTax" value="" class="form-control serviceTax" placeholder="Service Tax"> 
                                </div>

                                <div class="form-group col-sm-2 upload_div">
                                    <label class="labelUpload"><strong>Order Documents</strong></label>
                                    <input type="file" name="uploadFile[]" class="form-control uploadFile" multiple="multiple"> 
                                </div>




                                <div class="form-group col-sm-2 totalAmtPaid">
                                    <label class="labelTotalAmt"><strong>Total Amount Paid</strong></label>
                                    <input type="text"  name="totalAmtPaid" value="" class="form-control totalAmtPaid" placeholder="Total Amount Paid"> 
                                </div>



                                <div class="form-group col-sm-2">
                                    <label>Payment Status</label>
                                    <select class="form-control payment_status_select" id="paymentStatus" name="paymentStatus" placeholder="Please Select" required="true">
                                        <option value="">Please Select</option>
                                        <option value="0">Unpaid</option>
                                        <option value="1">Partially Paid</option>
                                        <option value="2">Fully Paid</option>

                                    </select>
                                </div>
                                <div class="clearfix "></div>
                                <div class="form-group col-sm-12 remark_div">
                                    <label class="labelRemark"><strong>Payment Details</strong></label>
                                    <textarea  name="remark" value="" class="form-control remark" cols="10" rows="1" placeholder="Remark"> </textarea>
                                </div>
                                <div class="clearfix "></div>

                            </div>
                            <div class="clearfix"></div>


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
                                    <th>Vendors Name</th>
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
                                    <th>Readings</th>
                                    <th>Toll</th>
                                    <th>Parking</th>
                                    <th>Permit</th>
                                    <th>vendor listing</th>
                                    <th>extra remarks</th>
                                    <th>carz Details</th>
                                    <th>vendor Details</th>

                                    <th>vendor prepaid amt</th>
                                    <th>vendor extra charges</th>
                                    <th>vendor remarks</th>
                                    <th>vendor discount</th>
                                    <th>vendor service tax</th>
                                    <th>Total Amount Paid</th>
                                    <th>Payment Status</th>

                                    <th></th>

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
                                    <td data-value="{{$order->mode}}">{{ $order->mode }}</td>
                                    <td>{{ $order->txn_ref_no }}</td>
                                    <td>{{ $order->txn_status }}</td>
                                    <td>{{ $order->txn_msg }}</td>
                                    <td data-value="{{$order->booking_status}}">{{ Helper::booking_status($order->booking_status) }}</td>
                                    <td data-value="{{$order->vender_id}}">{{ $order->venders_name }}</td>
                                    <td >{{ $order->drivers }}</td>
                                    <td>{{ $order->cars }}</td>
                                    <?php $start_date = date("d-M-Y", strtotime($order->start_date)); ?>

                                    <td data-value="{{$order->start_date}}">{{ $start_date }}</td>

                                    <?php $end_date = date("d-M-Y", strtotime($order->end_date)); ?>
                                    <td data-value="{{$order->end_date}}">{{$end_date }}</td>
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
                                    <td>{{ $order->readings }}</td>
                                    <td>{{ $order->toll }}</td>
                                    <td>{{ $order->parking }}</td>
                                    <td>{{ $order->permit }}</td>

                                    <td data-value="{{$order->vender_listing_id}}">{{$order->vender_listing_id}}</td>
                                    <td>{{ $order->extra_remarks }}</td>

                                    <td>{{ $order->carz_listing_details }}</td>

                                    <td>{{ $order->vendor_listing_details }}</td>




                                    <td>{{ $order->vendor_prepaid_amt }}</td>

                                    <td>{{ $order->vendor_extra_charges }}</td>
                                    <td>{{ $order->vendor_remarks }}</td>

                                    <td>{{ $order->vendor_discount }}</td>

                                    <td>{{ $order->vendor_service_tax }}</td>

                                    <td>{{ $order->total_amt_paid }}</td>

                                    <td data-value="{{$order->payment_status}}">{{ Helper::payment_status($order->payment_status) }}</td>



                                    <td>
                                        <a href="javascript:void();" class="orderEdit" data-id="{{$order->id}}" title="Edit Order Details" ><i class="fa fa-edit"> </i></a>
                                        {{HTML::linkAction('order_view', '', $order->id, array("title"=>"View Order Details","class"=>"fa fa-calendar-o")) }}
                                        {{HTML::linkAction('order_delete', '', $order->id ,array('class'=>'fa fa-trash','title'=> 'Delete Order', 'onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}

                                        @if($order->booking_status == 3)
                                        {{HTML::linkAction('invoice', '', $order->id ,array('class'=>'fa fa-line-chart','title'=> 'Print Sales Invoice', 'target' => '_blank')) }} 
                                        {{HTML::linkAction('purchase_invoice', '', $order->id ,array('class'=>'fa fa-shopping-cart','title'=> 'Print Purchase Invoice', 'target' => '_blank')) }} 

                                    </td>
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
    var carzListing;
    var vendorListing;
    var id = "";


    jQuery(document).ready(function($) {

        $("#carz_Listing").select2();

        $("#venderListing").select2();


        $(document).on("focus", ".datepickerz", function() {

            $(this).datetimepicker({
                dateFormat: "yy-mm-dd",
                timeFormat: "HH:mm:ss"

            });
        });

        $("#startDate").datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            onClose: function(selectedDate) {
                $("#endDate").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#endDate").datetimepicker({
            dateFormat: "yy-mm-dd",
            timeFormat: "HH:mm:ss",
            onClose: function(selectedDate) {
                $("#startDate").datepicker("option", "maxDate", selectedDate);
            }
        });
        $(".od-2").hide();
        $(".od-3").hide();

        $(".startkm1div").show();
        $(".endkm1div").show();

        $(document).on("click", ".orderEdit", function() {
            $("#orderForm").show();
            $(".readingz").html("");
            $("html, body").animate({scrollTop: 0}, "slow");
            id = $(this).attr('data-id');


            $("form#orderForm select[name='customer'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(1).attr("data-value") + "']").prop('selected', true);

            //   $("form#orderForm select[name='listing'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value") + "']").prop('selected', true);

            $('#carz_Listing').select2().select2('val', $("tr[data-tr='" + id + "'] td").eq(2).attr("data-value"));

            $("form#orderForm input[name='pickuptime']").val($("tr[data-tr='" + id + "'] td").eq(4).text());
            $("form#orderForm input[name='instructions']").val($("tr[data-tr='" + id + "'] td").eq(5).text());
            $("form#orderForm input[name='cost']").val($("tr[data-tr='" + id + "'] td").eq(6).text());
            $("form#orderForm select[name='mode'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(7).attr("data-value") + "']").prop('selected', true);
            $("form#orderForm input[name='txn_ref_no']").val($("tr[data-tr='" + id + "'] td").eq(8).text());
            $("form#orderForm input[name='txn_status']").val($("tr[data-tr='" + id + "'] td").eq(9).text());
            $("form#orderForm input[name='txn_msg']").val($("tr[data-tr='" + id + "'] td").eq(10).text());
            $("form#orderForm select[name='booking_status'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(11).attr("data-value") + "']").prop('selected', true);
            $("form#orderForm select[name='vendersName'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(12).attr("data-value") + "']").prop('selected', true);
            $('#venderListing').select2().select2('val', $("tr[data-tr='" + id + "'] td").eq(28).attr("data-value"));


            $("form#orderForm input[name='startDate[]']").val($("tr[data-tr='" + id + "'] td").eq(15).attr("data-value"));
            $("form#orderForm input[name='endDate[]']").val($("tr[data-tr='" + id + "'] td").eq(16).attr("data-value"));
            $("form#orderForm input[name='startKm[]']").val($("tr[data-tr='" + id + "'] td").eq(17).text());
            $("form#orderForm input[name='endKm[]']").val($("tr[data-tr='" + id + "'] td").eq(18).text());
            $("form#orderForm input[name='discount']").val($("tr[data-tr='" + id + "'] td").eq(19).text());
            $("form#orderForm input[name='serviceTax']").val($("tr[data-tr='" + id + "'] td").eq(20).text());
            $("form#orderForm textarea[name='remark']").val($("tr[data-tr='" + id + "'] td").eq(22).text());
            $("form#orderForm input[name='extraHrs[]']").val($("tr[data-tr='" + id + "'] td").eq(23).text());
            $("form#orderForm input[name='toll']").val($("tr[data-tr='" + id + "'] td").eq(25).text());
            $("form#orderForm input[name='parking']").val($("tr[data-tr='" + id + "'] td").eq(26).text());
            $("form#orderForm input[name='permit']").val($("tr[data-tr='" + id + "'] td").eq(27).text());

            $("form#orderForm input[name='extraRemark']").val($("tr[data-tr='" + id + "'] td").eq(29).text());

            var carzListing = jQuery.parseJSON($("tr[data-tr='" + id + "'] td").eq(30).text())
            $("#carzMinKm").val(carzListing[0]);
            $("#carzMinHr").val(carzListing[1]);
            $("#carzBaseCost").val(carzListing[2]);

            $("#carzExtraKmCost").val(carzListing[3]);
            $("#carzExtraHrCost").val(carzListing[4])
            $("#carzDriverCost").val(carzListing[5]);
            ;

            var vendorListing = jQuery.parseJSON($("tr[data-tr='" + id + "'] td").eq(31).text())
            $("#vendorMinKm").val(vendorListing[0]);
            $("#vendorMinHr").val(vendorListing[1]);
            $("#vendorBaseCost").val(vendorListing[2]);

            $("#vendorExtraKmCost").val(vendorListing[3]);
            $("#vendorExtraHrCost").val(vendorListing[4]);
            $("#vendorDriverCost").val(vendorListing[5]);

            $("form#orderForm input[name='vendor_prepaid_booking_amt']").val($("tr[data-tr='" + id + "'] td").eq(32).text());
            $("form#orderForm input[name='vendor_extra_charges']").val($("tr[data-tr='" + id + "'] td").eq(33).text());
            $("form#orderForm input[name='vendor_remarks']").val($("tr[data-tr='" + id + "'] td").eq(34).text());
            $("form#orderForm input[name='vendor_discount']").val($("tr[data-tr='" + id + "'] td").eq(35).text());
            $("form#orderForm input[name='vendor_service_tax']").val($("tr[data-tr='" + id + "'] td").eq(36).text());

            $("form#orderForm input[name='totalAmtPaid']").val($("tr[data-tr='" + id + "'] td").eq(37).text());
            $("form#orderForm select[name='paymentStatus'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(38).attr("data-value") + "']").prop('selected', true);



            if ($("tr[data-tr='" + id + "'] td").eq(28).attr("data-value") != "") {
                getVendorListing($("tr[data-tr='" + id + "'] td").eq(28).attr("data-value"), $("tr[data-tr='" + id + "'] td").eq(12).attr("data-value"));
            }
            if ($("tr[data-tr='" + id + "'] td").eq(12).attr("data-value") != "") {
                getVendorDetails($("tr[data-tr='" + id + "'] td").eq(12).attr("data-value"), id);
            }

            if ($("tr[data-tr='" + id + "'] td").eq(3).attr("data-value") != "") {
                getLocality($("tr[data-tr='" + id + "'] td").eq(2).attr("data-value"), id);
            }

            $(".od-2").hide();
            $(".od-3").hide();

            if ($("tr[data-tr='" + id + "'] td").eq(11).text() == "Confirmed") {
                $(".od-2").show();
                $(".od-3").hide();
            } else if ($("tr[data-tr='" + id + "'] td").eq(11).text() == "Allocated") {
                $(".od-2").show();
                $(".od-3").hide();
            } else if ($("tr[data-tr='" + id + "'] td").eq(11).text() == "Completed") {
                $(".od-2").show();
                $(".od-3").show();

                if (/local/i.test($("select[name='listing'] option:selected").text()))
                {
                    var readings = jQuery.parseJSON($("tr[data-tr='" + id + "'] td").eq(24).text());

                    var start = stringToDate($("#startDate").val());
                    var end = stringToDate($("#endDate").val());


                    var days = ((end - start) / 1000 / 60 / 60 / 24) + 1;

                    if (days >= 1) {
                        $(".startkm1div").hide();
                        $(".endkm1div").hide();

                        var j = 0;
                        var cont = "";
                        for (var i = 1; i <= days; i++) {
                            var nDate = start.getDate() + "-" + (start.getMonth() + 1) + "-" + start.getFullYear();


                            cont += ('<div class="form-group col-sm-2 days_div"><p><strong> ' + nDate + ' </strong></p></div>  <div class="form-group col-sm-2 start_km_div"><label class="labelStartKm"><strong>Start Km</strong></label><input type="text" required="true" name="startKm[]" value="' + (typeof readings[0].StartKm[j] === "undefined" ? "" : readings[0].StartKm[j]) + '" class="form-control startkm" placeholder="Start Km"></div><div class="form-group col-sm-2 end_km_div"><label class="labelStartKm"><strong>End Km</strong></label><input type="text" required="true" name="endKm[]" value="' + (typeof readings[1].EndKm[j] === "undefined" ? "" : readings[1].EndKm[j]) + '" class="form-control endkm" placeholder="End Km"></div><div class="form-group col-sm-2 start_DATE_div"><label class="labelStart"><strong>Actual start time</strong></label><input type="text" required="true" name="startDate[]" value="' + (typeof readings[2].start_DATE[j] === "undefined" ? "" : readings[2].start_DATE[j]) + '" class="form-control endkm datepickerz"  placeholder="Actual start time" autocomplete="off"></div><div class="form-group col-sm-2 end_DATE_div"><label class="labelEnd"><strong>Actual end time</strong></label><input type="text" required="true" name="endDate[]" value="' + (typeof readings[3].end_DATE[j] === "undefined" ? "" : readings[3].end_DATE[j]) + '" class="form-control endkm datepickerz"  placeholder="Actual end time" autocomplete="off"></div><div class="clearfix"></div>');
                            j++;
                            start.setDate(start.getDate() + 1);
                        }
                        $(".readingz").html(cont);
                    } else {
                        $(".start_km_div").show();
                        $(".end_km_div").show();
                    }
                } else {
                    $(".start_km_div").show();
                    $(".end_km_div").show();
                }
            }
            else {
                $(".start_km_div").show();
                $(".end_km_div").show();
            }
            $("form#orderForm").append("<input type='hidden' name='id' value='" + $("tr[data-tr='" + id + "'] td").eq(0).text() + "'>")
            $("form#orderForm").attr("action", "{{ URL::route('order_edit') }}");
        });

        $(document).on("change", ".booking_status_select", function() {
            var value = $(this).val();
            if (value == "1") {

                $(".od-3").hide();
                $(".od-2").show();
            } else
            if (value == "2") {
                $(".od-3").hide();
                $(".od-2").show();

            } else if (value == "3") {
                $(".od-3").show();
                $(".od-2").show();


                if (/local/i.test($("select[name='listing'] option:selected").text()))
                {
                    var readings = "";
                    try {
                        readings = jQuery.parseJSON($("tr[data-tr='" + id + "'] td").eq(24).text());
                    } catch (e) {
                        // console.log(e);
                    }
                    var start = stringToDate($("#startDate").val());
                    var end = stringToDate($("#endDate").val());
                    var days = ((end - start) / 1000 / 60 / 60 / 24) + 1;

                    if (days >= 1) {
                        $(".startkm1div").hide();
                        $(".endkm1div").hide();
                        var j = 0;
                        var cont = "";
                        for (var i = 1; i <= days; i++) {

                            var nDate = start.getDate() + "-" + (start.getMonth() + 1) + "-" + start.getFullYear();

                            var ActulaDateTimePopulate = start.getFullYear() + "-" + (start.getMonth() + 1) + "-" + start.getDate() + " 00:00:00";

                            cont += ('<div class="form-group col-sm-2 days_div"><p><strong> ' + nDate + ' </strong></p></div> <div class="form-group col-sm-2 start_km_div"><label class="labelStartKm"><strong>Start Km</strong></label><input type="text" required="true" name="startKm[]" value="" class="form-control startkm" placeholder="Start Km"></div><div class="form-group col-sm-2 end_km_div"><label class="labelStartKm"><strong>End Km</strong></label><input type="text" required="true" name="endKm[]" value="" class="form-control endkm" placeholder="End Km"></div><div class="form-group col-sm-2 start_DATE_div"><label class="labelStart"><strong>Actual start time</strong></label><input type="text" required="true" name="startDate[]" value="' + ActulaDateTimePopulate + '" class="form-control endkm datepickerz"  placeholder="Actual start time" autocomplete="off"></div><div class="form-group col-sm-2 end_DATE_div"><label class="labelEnd"><strong>Actual end time</strong></label><input type="text" required="true" name="endDate[]" value="' + ActulaDateTimePopulate + '" class="form-control endkm datepickerz"  placeholder="Actual end time" autocomplete="off"></div><div class="clearfix"></div>');
                            j++;
                            start.setDate(start.getDate() + 1);
                        }
                        $(".start_km_div").show();
                        $(".end_km_div").show();

                        if ($(".readingz").html() == "") {
                            $(".readingz").html(cont);
                        }
                    } else {
                        $(".start_km_div").show();
                        $(".end_km_div").show();
                    }
                }
            } else {
                $(".od-3").hide();
                $(".od-2").hide();
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


        $(document).on("change", ".listing_class", function() {
            var value = $(this).val();
            $.get(document.location.origin + "/admin/carz_listing_details/" + value, function(data) {
                carzListing = jQuery.parseJSON(data);
                //  alert(carzListing);
                $("#carzMinKm").val(carzListing[0]["min_kms"]);
                $("#carzMinHr").val(carzListing[0]["min_hrs"]);
                $("#carzBaseCost").val(carzListing[0]["base_cost"]);

                $("#carzExtraKmCost").val(carzListing[0]["extra_km_cost"]);
                $("#carzExtraHrCost").val(carzListing[0]["extra_hr_cost"]);
                $("#carzDriverCost").val(carzListing[0]["driver_cost"]);


            });



        });

        $(document).on("change", "#vendersName", function() {
            var vid = $(this).val();
            getVendorListing("", vid);

        });
        function getVendorListing(vlid, vid) {
            $.get(document.location.origin + "/admin/vendor_listing_dropdown/" + vid, function(data) {

                $("#venderListing").empty().append(data);

                if (vid != "") {
                    $('#venderListing').select2().select2('val', $("tr[data-tr='" + id + "'] td").eq(28).attr("data-value"));
                    //   $(".select_venderListing option[value='" + $("tr[data-tr='" + id + "'] td").eq(28).text() + "']").prop('selected', true);
                }
            });
        }


    });


    $(document).on("change", ".select_venderListing", function() {
        var value = $(this).val();
        $.get(document.location.origin + "/admin/vendor_listing_details/" + value, function(data) {
            vendorListing = jQuery.parseJSON(data);
            //  alert(carzListing);
            $("#vendorMinKm").val(vendorListing[0]["min_kms"]);
            $("#vendorMinHr").val(vendorListing[0]["min_hrs"]);
            $("#vendorBaseCost").val(vendorListing[0]["base_cost"]);

            $("#vendorExtraKmCost").val(vendorListing[0]["extra_km_cost"]);
            $("#vendorExtraHrCost").val(vendorListing[0]["extra_hr_cost"]);
            $("#vendorDriverCost").val(vendorListing[0]["driver_cost"]);

        });

    });



    function stringToDate(s) {
        var dateParts = s.split(' ')[0].split('-');
        var timeParts = s.split(' ')[1].split(':');
        var d = new Date(dateParts[0], --dateParts[1], dateParts[2]);
        d.setHours(timeParts[0], timeParts[1], timeParts[2])

        return d;
    }

    function check(select) {

        if (select.value == 0) {
            window.location.href = '{{ URL::route("users") }}?add=new'

        }

    }



    $(document).on("change", ".listing_class", function() {
        var lid = $(this).val();
        getLocality(lid, "");

    });

    function getLocality(lid, eid) {
        $.get(document.location.origin + "/admin/locality_dropdown/" + lid, function(data) {
            $("#locality_id").empty().append(data);

            if (lid != "") {
                $("form#orderForm select[name='locality'] option[value='" + $("tr[data-tr='" + id + "'] td").eq(3).attr("data-value") + "']").prop('selected', true);
            }

        });
    }



</script>
@stop