@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Service Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Services</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Services</h3>
                         {{ View::make('admin.includes.addButton',array("name"=>"Service")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                       
                        <form role="form" method="post" id="serviceForm" action="{{ URL::route('save_service'); }}">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Service Name</label>
                                <input type="text" name="service" class="form-control" placeholder="Service Name" required="true"/>
                            </div>

                            <!-- radio -->
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="serviceoptionsRadios1" value="1">
                                        Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="serviceoptionsRadios2" value="0">
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
                                    <th>Service</th>
                                    <th>Operational</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $services)
                                <tr data-tr="{{ $services->id }}">
                                    <td>{{ $services->id }}</td>
                                    <td>{{ $services->service }}</td>
                                    <td> {{ ($services->status == 0)?"No":"Yes" }}</td>
                                    <td><a href="javascript:void();" class="serviceEdit" data-id="{{$services->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('service_delete', 'Delete', $services->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>

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