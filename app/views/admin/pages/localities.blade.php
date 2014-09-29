@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Locality Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Locality</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Localities</h3>
                         {{ View::make('admin.includes.addButton',array("name"=>"Locality")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="localityForm" role="form" method="post" action="{{ URL::route('save_locality'); }}">


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
                                <label>Locality Name</label>
                                <input type="text" name="locality" class="form-control" placeholder="Locality Name" required="true"/>
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
                                     <th>City</th>
                                    <th>Locality</th>
                                
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($localities as $locality)
                                <tr data-tr="{{ $locality->id }}">
                                    <td>{{ $locality->id }}</td>
                                    <td data-value="{{$locality->city_id }}">{{ $locality->city_id }}</td>

                                    <td>{{ $locality->locality }}</td>

                                  
                                    <td><a href="javascript:void();" class="localityEdit" data-id="{{$locality->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('locality_delete', 'Delete', $locality->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>
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