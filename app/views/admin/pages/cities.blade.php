@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cities Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Cities</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add a New Cities</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="citiesForm" role="form" method="post" action="{{ URL::route('save_cities'); }}">
                            <!-- text input -->

                        
                            <div class="form-group">
                                <label>City Name</label>
                                <input type="text" name="city" class="form-control" placeholder="City Name" required="true"/>
                            </div>

                            <!-- radio -->
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="optionsRadios1" value="1" checked>
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="optionsRadios2" value="0">
                                        No
                                    </label>
                                </div>
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
                                            <th>City Name</th>
                                            <th>Operational</th>
                                            <th>Edit</th>
                                           
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $cities)
                                        <tr data-tr="{{$cities->id}}">
                                            <td>{{ $cities->id }}</td>
                                            <td>{{ $cities->city }}</td>
                                            <td> {{ ($cities->status == 0)?"No":"Yes" }}</td>
                                           
                                             <td><a href="javascript:void();" class="citiesEdit" data-id="{{$cities->id}}">Edit</a></td>

                                            <td>{{HTML::linkAction('city_delete', 'Delete', $cities->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>
                                        

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