@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Package Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Package</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add a New Package</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="packageForm" role="form" method="post" action="{{ URL::route('save_package'); }}">
                            <!-- text input -->

                            <input type="hidden" name="package_id" id="package_id" />
                            <div class="form-group">
                                <label>Package Name</label>
                                <input type="text" name="package" class="form-control" placeholder="Package Name" required="true"/>
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
                                    <th>Package</th>
                                    <th>Operational</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $packages)
                                <tr data-tr="{{ $packages->id }}">
                                    <td>{{ $packages->id }}</td>
                                    <td>{{ $packages->package }}</td>

                                    <th>{{ ($packages->status == 0)?"No":"Yes" }}</th>
                                    <td><a href="javascript:void();" class="packageEdit" data-id="{{$packages->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('package_delete', 'Delete', $packages->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>
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