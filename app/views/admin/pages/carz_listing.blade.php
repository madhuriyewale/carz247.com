@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Carz Listing
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Carz Listing</a></li>
            <li><a href="#">Carz Listing</a></li>
            <li class="active">Listing</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Listings</h3>
                         {{ View::make('admin.includes.addButton',array("name"=>"Listing")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="listingForm" id="listingForm" role="form" method="post" action="{{ URL::route('save_listing'); }}">
                            <!-- text input -->

                            <div class="form-group col-sm-3">
                                <label>City</label>
                                <select class="form-control" name="city" required="true">

                                    <option value="">Please Select</option>
                                    @foreach ($cities as $city)
                                    <option  value="{{ $city->id }}" >{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Service</label>
                                <select class="form-control" name="service" required="true" >
                                    <option value="">Please Select</option>
                                    @foreach ($services as $service)
                                    <option   value="{{ $service->id }}" >{{ $service->service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Category</label>

                                <select class="form-control" name="category" required="true">
                                    <option value="">Please Select</option>
                                    @foreach ($categories as $category)
                                    <option   value="{{ $category->id }}" >{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-sm-3">
                                <label>Package</label>
                                <select class="form-control"  name="package" required="true">
                                    <option value="">Please Select</option>
                                    @foreach ($packages as $package)
                                    <option value="{{ $package->id }}" >{{ $package->package }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-sm-3">
                                <label>Min kms</label>
                                <input type="text" name="min_kms" class="form-control" placeholder="Min Kms" required="true"/>
                            </div>
                            
                            
                             <div class="form-group col-sm-3">
                                <label>Min hrs</label>
                                <input type="text" name="min_hrs" class="form-control" placeholder="Min Hrs" />
                            </div>


                            <div class="form-group col-sm-3">
                                <label>Base cost</label>
                                <input type="text" name="base_cost" class="form-control" placeholder="Base cost" />
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Driver cost</label>
                                <input type="text" name="driver_cost" class="form-control" placeholder="Driver Kms" />

                            </div>


                            <div class="form-group col-sm-3">
                                <label>Extra Km Cost</label>
                                <input type="text" name="extra_km_cost" class="form-control" placeholder="Extra Km Kms" required="true"/>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Extra Hr Cost</label>
                                <input type="text" name="extra_hr_cost" class="form-control" placeholder="Extra Hr Kms" />
                            </div>


                            <!-- radio -->

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
                                    <th>City</th>
                                    <th> Service</th>  
                                    <th> Category </th>     
                                    <th> Package </th>   
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




                            @foreach ($listings as $listing)
                            <tr data-tr="{{ $listing->id}}">
                                <td>{{ $listing->id }}</td>
                                <td data-value="{{ $listing->city_id }}">{{ $listing->city }}</td>
                                <td data-value="{{ $listing->service_id }}">{{ $listing->service }}</td>
                                <td data-value="{{ $listing->category_id}}">{{ $listing->category }}</td>
                                <td data-value="{{ $listing->package_id }}">{{ $listing->package }}</td>
                                <td>{{ $listing->min_kms }}</td>
                                <td>{{ $listing->min_hrs }}</td>
                                <td>{{ $listing->base_cost }}</td>
                                <td>{{ $listing->driver_cost }}</td>
                                <td>{{ $listing->extra_km_cost }}</td>
                                <td>{{ $listing->extra_hr_cost }}</td>
                                <td><a href="javascript:void();" class="listingEdit" data-id="{{$listing->id}}">Edit</a></td>

                                <td>{{HTML::linkAction('listing_delete', 'Delete', $listing->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>

                            </tr>
                            @endforeach


                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</aside><!-- /.right-side -->
@stop          