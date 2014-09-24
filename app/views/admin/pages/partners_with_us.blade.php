@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Partner With Us        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Partner With Us</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Partners With Us</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">

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
                                    <th>Company Name</th>
                                    <th>Contact Person</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                     <th>Read</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $partner)
                                <tr >
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->company_name }}</td>
                                    <td>{{ $partner->contact_person }}</td>
                                    <td>{{ $partner->mobile_number }}</td>
                                    <td>{{ $partner->email }}</td>
                                     <td>{{ $partner->address }}</td>
                                      <td></td>
                                    

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