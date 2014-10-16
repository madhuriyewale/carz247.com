@extends('admin.layouts.default')
@section('content')
<aside class="right-side">                
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users Master
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Add New Users</h3>
                        {{ View::make('admin.includes.addButton',array("name"=>"User")) }}
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form  id="userForm" role="form" method="post" action="{{ URL::route('save_user'); }}">
                            <!-- text input -->

                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name" />
                            </div>


                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" required="true"/>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" />
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea cols="150" rows="2" name="address" id="address" class="form-control" ></textarea>
                            </div>


                            <div class="form-group">

                                <label>City</label>

                                <select class="form-control" name="city" required="true" >



                                    <option value="">Please Select</option>

                                    @foreach ($cities as $city)

                                    <option  value="{{ $city->id }}" >{{ $city->city }}</option>

                                    @endforeach

                                </select>

                            </div>


                            <div class="form-group">
                                <label>Zipcode </label>
                                <input type="text" name="zipcode" class="form-control" placeholder="Zip code"/>
                            </div>
                            <input type="hidden" name="fromOrder" value="{{ $fromOrder }}" />

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
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Zipcode</th>


                                    <th>Edit</th>

                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr data-tr="{{$user->id}}">
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->fname }}</td>
                                    <td>{{ $user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td data-value="{{ $user->city_id }}">{{ $user->city }}</td>

                                    <td>{{ $user->zipcode }}</td>

                                    <td><a href="javascript:void();" class="userEdit" data-id="{{$user->id}}">Edit</a></td>

                                    <td>{{HTML::linkAction('user_delete', 'Delete', $user->id ,array('onClick' => 'return confirm(\' Are you sure you want to Delete this Entry? \')')) }}</td>
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
<script>
    $(document).ready(function(){
    @if ($fromOrder == 1)
            $("#userForm").show();
            @endif
    });


</script>
@stop          