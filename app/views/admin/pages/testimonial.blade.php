@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Testimonals Master
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
                        <h3 class="box-title">Add a New</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form id="testimonialForm" role="form" method="post" action="{{ URL::route('save_testimonial'); }}">
                            <!-- text input -->


                            <div class="form-group">
                                <label>Testimonial</label>
                                <input type="text" name="testimonial" class="form-control" placeholder="Testimonial" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>From</label>
                                <input type="text" name="from" class="form-control" placeholder="From" required="true"/>
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
                                    <th>Testimonial</th>
                                    <th>From</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                <tr data-tr="{{$testimonial->id}}">
                                    <td>{{ $testimonial->id }}</td>
                                    <td>{{ $testimonial->testimonial }}</td>
                                    <td>{{ $testimonial->from }}</td>

                                    <td><a href="javascript:void();" class="testimonialEdit" data-id="{{$testimonial->id}}">Edit</a></td>

                                    <td>{{HTML::linkAction('testimonial_delete', 'Delete', $testimonial->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>


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