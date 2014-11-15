@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vendor Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Vendor</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Vendor</h3>
                        {{ View::make('admin.includes.addButton',array("name"=>"Vendors")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="venderForm" role="form" method="post" action="{{ URL::route('save_vender');  }}" enctype="multipart/form-data">
                            <!-- text input -->


                            <div class="form-group col-sm-6" >
                                <label>Vendor Company Name</label>
                                <input type="text" name="vendersName" class="form-control" placeholder="Vendor Company Name" required="true"/>
                            </div>


                            <div class="form-group  col-sm-6">
                                <label>Vendor Contact Name</label>
                                <input type="text" name="venderContactName" class="form-control" placeholder="Vendor Contact Name" required="true"/>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>City</label>
                                <select class="form-control" name="cityName" required>

                                    <option value="">Please Select</option>
                                    @foreach ($cities as $city)
                                    <option  value="{{ $city->id }}" >{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" required="true"/>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Zone</label>
                                <input type="text" name="zone" class="form-control" placeholder="Zone" />
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Mobile No</label>
                                <input type="text" name="mobileNo" class="form-control" placeholder="Mobile Number" required="true"/>
                            </div>


                            <div class="form-group col-sm-6">
                                <label>Alternate Contact No</label>
                                <input type="text" name="altContactNo" class="form-control" placeholder="Alternate Contact Number" />
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Email ID</label>
                                <input type="text" name="emailId" class="form-control" placeholder="Email ID" required="true"/>
                            </div>



                            <div class="form-group col-sm-6">
                                <label>Tan Number</label>
                                <input type="text" name="tanNo" class="form-control" placeholder="Tan Number" />
                            </div>


                            <div class="form-group col-sm-6">
                                <label>Pan Number</label>
                                <input type="text" name="panNo" class="form-control" placeholder="Pan Number" />
                            </div>


                            <div class="form-group col-sm-6">
                                <label>Sevice Tax Number</label>
                                <input type="text" name="serviceTaxNo" class="form-control" placeholder="Service Tax Number" />
                            </div>


                            <div class="form-group col-sm-6">
                                <label>Drivers (Enter Driver names separated by Comma)</label>
                                <input type="text" name="drivers" class="form-control" placeholder="Drivers" required="true"/>
                            </div>


                            <div class="form-group col-sm-12">
                                <label>Cars (Enter Car Models separated by Comma)</label>
                                <input type="text" name="cars" class="form-control" placeholder="Cars" required="true"/>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Car Numbers (Enter Car Numbers in the same order as that of the Car Models mentioned above)</label>
                                <input type="text" name="carNumbers" class="form-control" placeholder="Car Numbers" required="true"/>
                            </div>


                            <div class="form-group col-sm-6 ">
                                <label class="labelUpload"><strong>Upload Documents</strong></label>
                                <input type="file" name="uploadFile[]" class="form-control uploadFile" multiple="multiple"> 
                            </div>
                            <div class="form-group col-sm-6  doc">



                            </div>


                            <div class="clearfix "></div>

                            <h4 class="box-title">Document Checklist Section</h4> 

                            <div>
                                <label>
                                    <input id="chk0"  type="checkbox" name="chk[]" value="0"> TAN No Xerox
                                </label>

                            </div>
                            <div >
                                <label>
                                    <input  id="chk1"  type="checkbox" name="chk[]" value="1"> PAN No Xerox
                                </label>

                            </div>
                            <div>
                                <label>
                                    <input id="chk2"  type="checkbox" name="chk[]" value="2"> Cars RC Book Xerox
                                </label>

                            </div>

                            <div >
                                <label>
                                    <input id="chk3"  type="checkbox" name="chk[]" value="3"> Driver's Photos
                                </label>

                            </div>
                            <div>
                                <label>
                                    <input  id="chk4"  type="checkbox" name="chk[]" value="4"> Driver's License Xerox
                                </label>

                            </div>



                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        <div class="row">


            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="vendorTables" class="table vendorTables  table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>vendors company name</th>
                                    <th>City Name</th>
                                    <th>Address</th>
                                    <th>zone</th>
                                    <th>Mobile Number</th>
                                    <th>Tan No</th>
                                    <th>Pan No</th>
                                    <th>Drivers</th>
                                    <th>Cars</th>
                                    <th>vendors Contact Name</th>

                                    <th>Alternate contact No</th>
                                    <th>Service Tax No</th>
                                    <th> Email Id </th>

                                    <th>Car Numbers</th>
                                    <th>Upload documents</th>
                                    <th>check Vendors Doc</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venders as $vender)
                                <tr data-tr="{{ $vender->id }}">
                                    <td>{{ $vender->id }}</td>
                                    <td>{{ $vender->venders_name }}</td>
                                    <td data-value="{{$vender->city_id }}">{{ $vender->city }}</td>
                                    <td>{{ $vender->address }}</td>
                                    <td>{{ $vender->zone }}</td>
                                    <td>
                                        <?php $mobile_data = json_decode($vender->mobile_no); ?>
                                        <ol>
                                            @foreach($mobile_data as $mobile)
                                            <li>{{ $mobile }} </li>

                                            @endforeach
                                        </ol>                                   


                                    </td>
                                    <td>{{ $vender->tan_no }}</td>
                                    <td>{{ $vender->pan_no }}</td>
                                    <td>
                                        <?php $driver_data = json_decode($vender->drivers); ?>
                                        <ol>
                                            @foreach($driver_data as $driver)

                                            <li>{{ $driver }}</li>
                                            @endforeach
                                        </ol>

                                    </td>
                                    <td>
                                        <?php $car_data = json_decode($vender->cars, true);
                                        ?>
                                        <ol>
                                            @foreach($car_data as $car)
                                            <li>  {{ $car }}</li>
                                            @endforeach
                                        </ol>

                                    </td>

                                    <td>{{ $vender->vendors_contact_name }}</td>

                                    <td>{{ $vender->alternate_contact_no }}</td>
                                    <td>{{ $vender->service_tax_no }}</td>
                                    <td>{{ $vender->email_id }}</td>

                                    <td>
                                        <?php $carzNumbers = json_decode($vender->cars_numbers, true); ?>
                                        <ol>
                                            @foreach($carzNumbers as $carNo)
                                            <li>  {{ $carNo }}</li>
                                            @endforeach
                                        </ol>

                                    </td>

                                    <td>

                                        <?php $vendorDocuments = json_decode($vender->vendors_documents, true); ?>
                                        <ol>
                                            @foreach($vendorDocuments as $vendorDocument)


                                            <li>  <a href="/public/admin/uploads/vendor-uploads/<?php echo $vendorDocument ?>" target="_blank"> {{$vendorDocument }}</a></li>
                                            </li>
                                            @endforeach
                                        </ol>

                                    </td>
                                    <td>
                                        <?php $checkVendorDocuments = json_decode($vender->check_vendors_documents, true); ?>
                                        <ol>
                                            @foreach($checkVendorDocuments as $checkVendorDocument)
                                            <?php
                                            if ($checkVendorDocument == 0) {
                                                $doc = "TAN No Xerox";
                                            } elseif ($checkVendorDocument == 1) {
                                                $doc = "PAN No Xerox";
                                            } elseif ($checkVendorDocument == 2) {
                                                $doc = "Cars RC Book Xerox";
                                            } elseif ($checkVendorDocument == 3) {
                                                $doc = "Drivers Photos";
                                            } elseif ($checkVendorDocument == 4) {
                                                $doc = "Drivers License Xerox";
                                            }
                                            ?> 

<?php //$doc = Helper::vendor_doc($checkVendorDocument);  ?>

                                            <li data-value="{{$checkVendorDocument}}">

                                                {{$doc}}

                                            </li>
                                            @endforeach
                                        </ol>
                                    </td>

                                    <td><a href="javascript:void();" class="venderEdit" data-id="{{$vender->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('vender_delete', 'Delete', $vender->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>


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
@stop          