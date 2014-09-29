@extends('frontend.layouts.default')

@section('content')

<div class="header listing-bg  header_thin" >



    <div class="header_title">

       <h1> Contact <span>Us</span></h1>

    </div>

    

    <div id="middle" class="cols2">

	<div class="container clearfix">  

		<!-- content -->

        <div class="content">

            <!-- comment form -->

            <div class="add-comment mt0" id="addcomments">

                

               

                

                <div class="comment-form" >

                    <form action="{{ URL::route('save_contact'); }}" method="post">

                    <div id="reg_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div>  

                   <h5 class="mt15">You may contact us by filling the form given below &amp; our team will get in touch with you soon.</h5> 

                    

                    <div class="row alignleft field_text">

                        <label class="label_title"><strong>Name</strong></label>

                        <input type="text" name="name" value="" id="name" class="inputtext_new input_middle required validate[required] text-input" >

                    </div>

                                                          

                    <div class="row alignleft field_text omega">

                        <label class="label_title"><strong>Email</strong> </label>

                        <input type="email" name="email" value="" id="email" class="inputtext_new input_middle required validate[required,custom[email]]" >

                    </div>

                   

                    <div class="clear"></div>  

                    <div class="row alignleft field_text">

                        <label class="label_title"><strong>Mobile</strong></label>

                        <input type="text" name="mobile" value="" id="mobile" class="inputtext_new input_middle required validate[required] text-input" >

                    </div>

                    

                    <div class="clear"></div>  

                    <div class="row alignleft field_text">

                        <label class="label_title"><strong>Message</strong></label>

                        <textarea cols="20" rows="10" name="message" id="msg" class="textarea textarea_middle required validate[required] text-input"></textarea>

                    </div>

                    <div class="clear"></div>  

               

                    <div class="row rowSubmit clearfix">

                        <input type="submit" id="contact" value="Submit" class="btn btn-submit btn_send">                            

                        

                    </div>

                    

                </form>

                </div>

            </div>

            <!--/ comment form --> 

            

            

            
 
        </div>

        <!--/ content -->

        

        <!-- sidebar -->

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

		        <!--/ widget_categories -->

               

                <!-- widget_recent_comments -->                   

	            <div class="widget-container widget_popular">

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.6816175232857!2d72.90619!3d19.077730999999968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c62f40000039%3A0xe11790fc65fd4052!2sInfini+Systems+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1404382625455" width="230" height="230" frameborder="0" style="border:0"></iframe>

				</div>

				<!--/ widget_recent_comments --> 

                

                

            <div class="box_bot"></div>

            </div>

            

                

        </div>        <!--/ sidebar -->  

              

    </div>

</div>

    



</div>





<!--/ testimonials -->

@stop