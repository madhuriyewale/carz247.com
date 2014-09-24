@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg  header_thin" >

    <div class="header_title">
        <h1> <span>Editing Profile</span></h1>
    </div>

</div>


<div id="middle" class="cols2">
    <div class="container clearfix">
        <div class="content">
            <div class="comment-form">
                <form action="{{ URL::route('update_edit_profile'); }}" method="post" class="">



                    <div id="reg_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div> 



                    <input name="customerid"  class="inputtext input_middle" value="{{ $customers->id}}" type="hidden"> 


                    <div id="register_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div>
                    <div class="row alignleft field_text">
                        <label class="label_title">First Name*</label>
                        <input name="fname" id="fname" class="inputtext input_middle" value="{{ $customers->fname}}" type="text">

                    </div>




                    <div class="row alignleft field_text omega">
                        <label class="label_title">Last Name*</label>
                        <input name="lname" id="lname" class="inputtext input_middle" value="{{ $customers->lname}}" type="text">
                    </div>





                    <div class="row alignleft field_text">
                        <label class="label_title">Mobile*</label>
                        <input name="mobile" id="mobile" class="inputtext input_middle" value="{{ $customers->phone}}" type="text">
                    </div>


                    <div class="row alignleft field_text omega">
                        <label class="label_title">Email*</label>
                        <input name="email" id="email" class="inputtext input_middle" value="{{ $customers->email}}" type="email">
                    </div>


                    <div class="clear"></div>

                    <div class="row alignleft field_text">
                        <label  class="label_title">Address*</label>
                        <textarea name="address" id="address" class="textarea textarea_middle"  type="text">{{ $customers->address}}</textarea>
                    </div>



                    <div class="row alignleft field_select">

                        <label class="label_title">City</label>

                        <select  name="city" class="select_styled">



                            <option value="">Please Select</option>

                            @foreach ($cities as $city)
                            {{ $selected=""; }}
                            @if($city->id==$customers->city_id)
                            {{$selected="selected"; }}

                            @endif
                            <option {{ $selected }} value="{{ $city->id }}" >{{ $city->city}}</option>


                            @endforeach

                        </select>

                    </div>






                    <div class="row alignleft field_text omega">
                        <label  class="label_title">Zipcode*</label>
                        <input name="zipcode" id="pincode" class="inputtext input_middle" value="{{ $customers->zipcode}}" type="text">
                    </div>

                    <div class="clear"></div>

                    <div class="row rowSubmit clearfix">

                        <input type="submit" name="register" class="btn-submit btn_send" value="Submit" id="register_btn" tabindex="100">
                    </div>
                </form>


            </div>
        </div>
    </div>


    <!--/ testimonials -->
    @stop