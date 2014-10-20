@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
Careers      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Careers</li>
            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Careers</h3>
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
                        <table id="listingTables" class="table table-mailbox">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Resume</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($careers as $career)
                                <tr >
                                    <td>{{ $career->id }}</td>
                                    <td>{{ $career->name }}</td>
                                    <td>{{ $career->email }}</td>
                                    <td>{{ $career->mobile }}</td>
         <td><a href="/public/frontend/resume-uploads/{{$career->resume}}" target="_blank"> {{ $career->resume }}</a></td>
                                     <td>{{ $career->remarks }}</td>
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