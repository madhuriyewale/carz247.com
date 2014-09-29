@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg  header_thin" >
    <div class="header_title"> <strong> Registration <span>Form</span> </strong> </div>
</div>
<div id="middle" class="cols2">
    <div class="container clearfix">
        <!-- content -->
        <div class="content">
            <!-- offers list -->
            @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif

            <div class="comment-form">

                <form action="{{ URL::route('save_register'); }}" method="post" class="">

                    <div id="reg_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div> 

                    <div id="register_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div>
                    <div class="row alignleft field_text">
                        <label class="label_title">First Name*</label>
                        <input name="fname" id="fname" class="inputtext input_middle validate[required] text-input"  type="text">

                    </div>

                    <div class="row alignleft field_text omega">
                        <label class="label_title">Last Name*</label>
                        <input name="lname" id="lname" class="inputtext input_middle validate[required] text-input" type="text">
                    </div>

                    <div class="row alignleft field_text">
                        <label class="label_title">Mobile*</label>
                        <input name="mobile" id="mobile" class="inputtext input_middle validate[required] text-input" type="number">
                    </div>


                    <div class="row alignleft field_text omega">
                        <label class="label_title">Email*</label>
                        <input name="email" id="email" class="inputtext input_middle validate[required,custom[email]]" type="email">
                    </div>

                    <div class="row alignleft field_text">
                        <label  class="label_title">Password*</label>
                        <input name="password" id="password"  class="inputtext input_middle validate[required,minSize[6]] text-input" value="" type="password">
                    </div>


                    <div class="row alignleft field_text omega">
                        <label  class="label_title">Confirm Password*</label>
                        <input name="confirm_password" id="cpass" class="inputtext input_middle validate[required,minSize[6]] text-input" value="" type="password" >
                    </div>

                    <div class="clear"></div>

                    <div class="row alignleft field_text">
                        <label  class="label_title">Address*</label>
                        <textarea name="address" id="address" class="textarea textarea_middle validate[required] text-input"  type="text" ></textarea>
                    </div>

                    <div class="row alignleft field_select">
                        <label class="label_title">City</label>
                        <select  name="city" class="select_styled validate[required]" >
                            <option value="">Please Select</option>
                            @foreach ($cities as $city)
                            <option  value="{{ $city->id }}" >{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row alignleft field_text omega">
                        <label  class="label_title">Zipcode*</label>
                        <input name="zipcode"  id="pincode" class="inputtext input_middle validate[required] text-input" value="" type="text"/>
                    </div>
                    <div class="clear"></div>
                    <div class="row rowSubmit clearfix">
                        <input type="submit" name="register" class="btn-submit btn_send" value="Submit" id="register_btn" tabindex="100">
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar">
            <div class="box">
                <h3 class="widget-title mb0 padding15"> <i class="fa fa-map-marker"></i> Address</h3>
                <!-- widget_categories --> 
                <div class="widget-container widget_categories ">
                    <div class="booking_sum">112-113, B Wing,<br>

                        Kanarra Business Center,<br>

                        Laxmi Nagar, Ghatkopar East,<br>

                        Mumbai - 400 075.</div>

                    <div class="booking_sum"><i class="fa fa-mobile"></i> 7666 947 247</div>

                    <div class="booking_sum"><i class="fa fa-envelope-o"></i> bookings@carz247.com</div>

                </div>  

                <div class="widget-container widget_popular">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.6816175232857!2d72.90619!3d19.077730999999968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c62f40000039%3A0xe11790fc65fd4052!2sInfini+Systems+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1404382625455" width="230" height="230" frameborder="0" style="border:0"></iframe>

                </div>

                <!--/ widget_recent_comments --> 
                <div class="box_bot"></div>

            </div>

        </div>

    </div>

    <!--/ content -->

</div>

<!--/ testimonials -->

@stop