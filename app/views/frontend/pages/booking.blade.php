@extends('frontend.layouts.default')
@section('content')




<div class="header listing-bg header_thin">            
    <div class="header_title">
        <strong> 
            <i class="fa fa-car"></i> STEP 1
            <span><i class="fa fa-chevron-right"></i> <i class="fa fa-pencil-square-o"></i> STEP 2</span> 
            <i class="fa fa-chevron-right"></i> <i class="fa fa-thumbs-up"></i> STEP 3
        </strong>
    </div>
</div>
<div id="middle" class="cols2">
    <div class="container clearfix">  
        <!-- content -->
        <div class="content">
            <!-- comment form -->
            <div class="add-comment" id="addcomments">

                <div class="add-comment-title">
                    <h3>Contact / Pick Up DEtails</h3>
                </div>


                <div class="comment-form">
                    <form action="{{ URL::route('save_booking'); }}" method="post" id="pickupDetailsForm">
                        <input type="hidden" name="userId" value="{{ Session::get('customer_id');}}" />
                        <div class="row alignleft field_select">
                            <label class="label_title"><strong> Pickup time </strong><SPAN><B>*</B></SPAN> </label>
                            <select class="select_styled validate[required]" id="pickuptime" name="hour">
                                <option  value="" >Hours</option>
                                <?php for ($i = 1; $i <= 24; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <div class="row alignleft field_select omega">
                            <label  class="label_title">&nbsp; </label>
                            <select  class="select_styled validate[required]" id="pickupmins" name="mins">
                                <option  value="" >Minutes</option>                               
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>

                            </select>
                        </div>
                        <div class="clear"></div>
                        <div class="row alignleft field_text">
                            <label class="label_title"><strong>Email</strong> </strong><SPAN><B>*</B></SPAN> </label>
                            <input type="text" value="{{ Session::get('email'); }}" name="email" id="search_email" class="inputtext input_middle validate[required,custom[email]]" >

                        </div>

                        <div class="row alignleft field_text omega">
                            <label class="label_title"><strong>Mobile</strong></strong><SPAN><B>*</B></SPAN></label>
                            <input type="text" name="phone" value="{{ Session::get('phone'); }}" class="inputtext input_middle required validate[required] text-input">
                        </div>



                        <div class="clear"></div>  
                        <div class="row alignleft field_text ">
                            <label class="label_title"><strong>First Name</strong> </strong><SPAN><B>*</B></SPAN></label>
                            <input type="text" name="firstname" value="{{ Session::get('fname'); }}" class="inputtext input_middle  validate[required] text-input">
                        </div>

                        <div class="row alignleft field_text omega">
                            <label class="label_title"><strong>Last Name</strong> </strong><SPAN><B>*</B></SPAN></label>
                            <input type="text" name="lastname" value="{{ Session::get('lname'); }}" class="inputtext input_middle  validate[required] text-input">
                        </div>



                        <div class="clear"></div>  

                        <div class="row alignleft field_select">
                            <label class="label_title"><strong>Locality</strong> </strong><SPAN><B>*</B></SPAN></label>
                            <select class="select_styled validate[required] text-input" name="locality"  id="locality">
                                <option value="">Please Select</option>
                                @foreach ($localities as $city)
                                <option value="{{ $city->id }}">{{ $city->locality }}</option>
                                @endforeach
                                   <option  value="0" >Other</option>
                            </select>
                        </div>
                        <div class="row alignleft field_text omega">
                            <label class="label_title"><strong>Zipcode</strong></strong><SPAN><B>*</B></SPAN></label>
                            <input type="text" name="zipcode" value="{{ Session::get('zipcode'); }}" class="inputtext input_middle required validate[required] text-input"> 
                        </div>
                        <div class="clear"></div> 
                        <div class="row alignleft field_text">
                            <label class="label_title"><strong>Address</strong> </strong><SPAN><B>*</B></SPAN></label>
                            <textarea cols="30" rows="10" name="address" class="textarea textarea_middle required validate[required] text-input" >{{ Session::get('address'); }}</textarea>
                        </div>

                        <div class="row alignleft field_text omega">
                            <label class="label_title"><strong>Instructions</strong></label>
                            <textarea cols="30" rows="10" name="instructions" class="textarea textarea_middle" ></textarea>
                        </div>
                        <div class="clear"></div> 
                        <div class="row rowSubmit clearfix">
                            <input type="hidden" name="listing_id" value="{{ $listing[0]['id'] }}" />
                            <input type="hidden" name="cost" value="{{ $listing[0]['base_cost'] * 0.3 }}" />
                            <input type="submit" value="CONTINUE" class="btn btn-submit btn_send">                            
                            <a onClick="document.getElementById('commentForm').reset();
                                    return false" href="#" class="link-reset">Reset all fields</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/ content --> 

        <!-- sidebar -->

        <div class="sidebar">
            <div class="box">
                <!-- widget_categories -->
                <h3 class="widget-title mb0 padding15 pb0">Booking Summary</h3>

                <h4 class="mb0 padding15"> <i class="fa {{ $listing[0]['service_id'] == 1 ? "fa-map-marker" : $listing[0]['service_id'] == 3 ? "fa-plane" : "fa-tachometer" }}"></i> {{ $listing[0]['service'] }}</h4>
                <div class="widget-container widget_popular">
                <!--    <img src="http://carz247.com/images/compact_2.jpg"> -->

                    {{ HTML::image('public/frontend/images/car-uploads/'.$listing[0]['image'],'', array()) }}
                    <div class="booking_sum"><span>Car Category: </span> {{ $listing[0]['category'] }}</div>
                    <div class="booking_sum"><span>Location: </span>{{ $listing[0]['city'] }}</div>
                    <div class="booking_sum"><span>{{ $listing[0]['service_id'] == 2 ? "On" : "From" }}: </span>{{ Session::get('fromDate') }}</div>
                    @if($listing[0]['service_id'] == 2)<div class="booking_sum"><span>To :</span>{{ Session::get('toDate') }}</div> @endif
                    <div class="booking_sum"><span>Base Cost: </span> <i class="fa fa-inr"></i> {{ number_format($listing[0]['base_cost']) }}</div>
                </div>
                <div class="widget-container widget_tag_cloud">	        	
                    <h3 class="widget-title">Inclusions:</h3>
                    <div class="tagcloud">
                        <div class="booking_sum"><span>Kilometers: </span>{{ $listing[0]['min_kms'] }} Kms</div>
                        @if($listing[0]['service_id'] == 2) <div class="booking_sum"><span>No Of Days: {{ $days }} </span></div> @endif
                        @if($listing[0]['service_id'] != 2) <div class="booking_sum"><span>Hours: </span>{{ $listing[0]['min_hrs'] }} Hrs</div> @endif
                        <div class="booking_sum"><span>Chauffeur</span></div>
                    </div>
                </div>  
                <div class="widget-container widget_archive">
                    <h3 class="widget-title">Exclusions</h3>		
                    <div class="tagcloud">
                        <div class="booking_sum"><span>Service Tax, Toll, Parking  </span></div>
                        <div class="booking_sum"><span>Extra Km beyond {{ $listing[0]['min_kms'] }} Kms: </span> <i class="fa fa-inr"></i> {{ $listing[0]['extra_km_cost'] }} per Km.</div>
                        @if($listing[0]['service_id'] != 2) <div class="booking_sum"><span>Extra Hours beyond {{ $listing[0]['min_hrs'] }} hrs: </span> <i class="fa fa-inr"></i> {{ $listing[0]['extra_hr_cost'] }} per Hr</div> @endif
                    </div>
                </div>
                <div class="box_bot"></div>
            </div>

        </div>
        <!--/ sidebar -->  
    </div>
    <!--/ content -->
</div>
@stop