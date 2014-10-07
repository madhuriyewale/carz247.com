@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Vender Listing Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Vender Listing</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Vendor Listing <?php  Config::get('constants.ADMIN_NAME'); ?></h3>
                          {{ View::make('admin.includes.addButton',array("name"=>"venderListing")) }}

                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="venderListingForm" role="form" method="post" action="{{ URL::route('save_vender_listing'); }}">
                            <!-- text input -->


                            <div class="form-group">
                                <label>Vender Name</label>
                                <select class="form-control" name="vender_name">

                                    <option value="">Please Select</option>
                                    @foreach ($venders as $vender)
                                    <option  value="{{ $vender->id }}" >{{ $vender->venders_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control" name="city">

                                    <option value="">Please Select</option>
                                    @foreach ($cities as $city)
                                    <option  value="{{ $city->id }}" >{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Service</label>
                                <select class="form-control" name="service"  >
                                    <option value="">Please Select</option>
                                    @foreach ($services as $service)
                                    <option   value="{{ $service->id }}" >{{ $service->service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Category</label>

                                <select class="form-control" name="category">
                                    <option value="">Please Select</option>
                                    @foreach ($categories as $category)
                                    <option   value="{{ $category->id }}" >{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Package</label>
                                <select class="form-control"  name="package">
                                    <option value="">Please Select</option>
                                    @foreach ($packages as $package)
                                    <option value="{{ $package->id }}" >{{ $package->package }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Min kms</label>
                                <input type="text" name="min_kms" class="form-control" placeholder="Min Kms" required="true"/>
                            </div>


                            <div class="form-group">
                                <label>Min hrs</label>
                                <input type="text" name="min_hrs" class="form-control" placeholder="Min Hrs" required="true"/>
                            </div>


                            <div class="form-group">
                                <label>Base cost</label>
                                <input type="text" name="base_cost" class="form-control" placeholder="Base cost" />
                            </div>

                            <div class="form-group">
                                <label>Driver cost</label>
                                <input type="text" name="driver_cost" class="form-control" placeholder="Driver Kms" required="true"/>

                            </div>


                            <div class="form-group">
                                <label>Extra Km Cost</label>
                                <input type="text" name="extra_km_cost" class="form-control" placeholder="Extra Km Kms" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>Extra Hr Cost</label>
                                <input type="text" name="extra_hr_cost" class="form-control" placeholder="Extra Hr Kms" />
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
                                    <th>Vender Name</th>
                                    <th>City</th> 
                                    <th>Service</th>  
                                    <th>Category</th>  
                                    <th>Package</th>
                                    <th>Min kms</th>
                                    <th>Min hrs</th>
                                    <th>Base cost</th>
                                    <th>driver cost</th>                                     
                                    <th>Extra Km cost</th>
                                    <th>Extra Hr cost</th>

                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vender_listings as $vender_listing)
                                <tr data-tr="{{ $vender_listing->id }}">
                                    <td>{{ $vender_listing->id }}</td>
                                    <td data-value="{{ $vender_listing->vender_id  }}">{{ $vender_listing->venders_name }}</td>
                                    <td data-value="{{ $vender_listing->city_id  }}" >{{ $vender_listing->city }}</td>
                                    <td data-value="{{ $vender_listing->service_id  }}">{{ $vender_listing->service }}</td>
                                    <td data-value="{{ $vender_listing->category_id  }}">{{ $vender_listing->category }}</td>
                                    <td data-value="{{ $vender_listing->package_id  }}">{{ $vender_listing->package }}</td>
                                    <td>{{ $vender_listing->min_kms }}</td>
                                    <td>{{ $vender_listing->min_hrs }}</td>
                                    <td>{{ $vender_listing->base_cost }}</td>
                                    <td>{{ $vender_listing->driver_cost }}</td>
                                    <td>{{ $vender_listing->extra_km_cost }}</td>
                                    <td>{{ $vender_listing->extra_hr_cost }}</td>
                                    <td><a href="javascript:void();" class="venderListingEdit" data-id="{{$vender_listing->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('vender_listing_delete', 'Delete', $vender_listing->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>

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