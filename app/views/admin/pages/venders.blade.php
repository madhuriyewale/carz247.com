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
            <li class="active">Vender</li>
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
                        <form id="venderForm" role="form" method="post" action="{{ URL::route('save_vender'); }}">
                            <!-- text input -->


                            <div class="form-group">
                                <label>Vender Name</label>
                                <input type="text" name="vendersName" class="form-control" placeholder="Vendor Name" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="cityName" class="form-control" placeholder="City" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" required="true"/>
                            </div>
                            <div class="form-group">
                                <label>Zone</label>
                                <input type="text" name="zone" class="form-control" placeholder="Zone" required="true"/>
                            </div>
                            <div class="form-group">
                                <label>Mobile No</label>
                                <input type="text" name="mobileNo" class="form-control" placeholder="Mobile Number" required="true"/>
                            </div>


                            <div class="form-group">
                                <label>Tan No</label>
                                <input type="text" name="tanNo" class="form-control" placeholder="Tan Number" required="true"/>
                            </div>


                            <div class="form-group">
                                <label>Pan No</label>
                                <input type="text" name="panNo" class="form-control" placeholder="Pan Number" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>Drivers</label>
                                <input type="text" name="drivers" class="form-control" placeholder="Drivers" required="true"/>
                            </div>


                            <div class="form-group">
                                <label>Cars</label>
                                <input type="text" name="cars" class="form-control" placeholder="Cars" required="true"/>
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
                        <table id="listingTables" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>vendor name</th>
                                    <th>City Name</th>
                                    <th>Address</th>
                                    <th>zone</th>
                                    <th>Mobile Number</th>
                                    <th>Tan No</th>
                                    <th>Pan No</th>
                                    <th>Drivers</th>
                                    <th>Cars</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venders as $vender)
                                <tr data-tr="{{ $vender->id }}">
                                    <td>{{ $vender->id }}</td>
                                    <td>{{ $vender->venders_name }}</td>
                                    <td>{{ $vender->city }}</td>
                                    <td>{{ $vender->address }}</td>
                                    <td>{{ $vender->zone }}</td>
                                    <td>
                                        <?php $mobile_data =json_decode($vender->mobile_no); ?>
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
                                        <?php $car_data = json_decode($vender->cars, true); ?>
                                        <ol>
                                            @foreach($car_data as $car)
                                            <li>  {{ $car }}</li>
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