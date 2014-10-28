@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Categories</h3>
                        {{ View::make('admin.includes.addButton',array("name"=>"Category")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" id="categoryForm" action="{{ URL::route('save_category'); }}"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group col-sm-3">
                                <label>Category Name</label>
                                <input type="text" name="category" class="form-control" placeholder="Category Name" required="true"/>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Cars</label>
                                <input type="text" name="cars" class="form-control" placeholder="Car" required="true"/>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Seats</label>
                                <input type="text" required="true" name="seats" class="form-control" placeholder="Seats"/>
                            </div>


                            <div class="form-group col-sm-3">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" id="exampleInputFile" class="form-control" name="image">
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <label>

                                    Operational

                                </label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="optionsRadios1" value="1" >
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
                                    <th>Category</th>
                                    <th>cars</th>
                                    <th>Seats</th>
                                    <th>Car Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr data-tr="{{ $category->id }}">
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category }}</td>

                                    <td><?php $cars_data = json_decode($category->cars, true); ?>  

                                        <ol>
                                            @foreach ($cars_data as $car)

                                            <li> {{$car }}</li>

                                            @endforeach

                                        </ol>
                                    </td>
                                    <td>{{ $category->seats }}</td>
                                    <td>{{ HTML::image('public/frontend/images/car-uploads/'.$category->image,'', array('class' => 'thumbnail','width'=>'200')) }}</td>
                                    <td data-value="{{$category->status}}" >{{ ($category->status == 0)?"No":"Yes" }}</td>


                                    <td><a href="javascript:void();" class="categoryEdit" data-id="{{$category->id}}">Edit</a></td>
                                    <td>{{HTML::linkAction('category_delete', 'Delete', $category->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>


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