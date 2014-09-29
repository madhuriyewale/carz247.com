@extends('frontend.layouts.default')

@section('content')

<div class="header listing-bg  header_thin" >



    <div class="header_title">

      <h1>Partner with <span>Us</span></h1>

    </div>



</div>

<div id="middle" class="cols2">

	<div class="container clearfix">  

		<!-- content -->

        <div class="content">

            <!-- posts list -->

            <div class="contact_box">

                    <!--<div class="post-aside clearfix ">

                    <div class="padding15">

	                    <div class="entry">

	                    	

                            <p>We are always happy to collaborate with you, please contact us at parin@infiniteit.biz for partnerships/Tie-Ups </p>

                            <ol class=" pl30">

                            <li><strong>

                             Send us an email</strong><br>

                            	If you want to be our partner, write to us at info@carz247.com and we'll try our best to get back to you within a few hours.

                            </li><br>

                            <li><strong> Pick up the phone and call us 24*7</strong><br>

                            	7666 947 247

                            </li><br>

                            <li><strong>Send snail mail to this address</strong><br>

                            	112-113, B Wing, Kanarra Business Center, Laxmi Nagar, Ghatkopar East, Mumbai - 400 075.

                            </li><br>

                            

                            <li><strong>Or fill the adjoining form</strong><br>

                            	

                            </li>

                            </ol>

                            

	                    </div>  

                    </div>

                    </div>-->   
                    
                    <div class="box_content clearfix">       
                    	<p>We are always happy to collaborate with you, please contact us at parin@infiniteit.biz for partnerships/Tie-Ups </p>     
                         <ol class="ml30 mt10">

                            <li><strong>

                             Send us an email</strong><br>

                            	If you want to be our partner, write to us at info@carz247.com and we'll try our best to get back to you within a few hours.

                            </li><br>

                            <li><strong> Pick up the phone and call us 24*7</strong><br>

                            	7666 947 247

                            </li><br>

                            <li><strong>Send snail mail to this address</strong><br>

                            	112-113, B Wing, Kanarra Business Center, Laxmi Nagar, Ghatkopar East, Mumbai - 400 075.

                            </li><br>

                            

                            <li><strong>Or fill the adjoining form</strong><br>

                            	

                            </li>

                            </ol>
    	
	                </div>             

               

                

                

            </div>

         

            

        </div>

       

        <div class="sidebar">

        	<div class="box">

           
				<h3 class="widget-title mb0 padding15">Partner With US</h3>
		       

                <form id="partnerForm" action="{{ URL::route('save_partner'); }}" method="post" class="side_form">

                     <div id="reg_error" ></div> 

                    <div class="row">

                        <label class="label_title">Company Name:</label>

                        <input name="company_name" id="company_name" type="text" class="sidebar_input  validate[required] text-input" >

                        <div class="clear"></div>

                        

                        <label class="label_title">Contact Person:</label>

                        <input name="contact_person" id="contact_person" type="text" class="sidebar_input validate[required] text-input" >

                       

                        <div class="clear"></div>

                        

                        <label class="label_title">Mobile Number:</label>

                        <input name="mobile" id="mobile" type="number" class="sidebar_input validate[required] text-input">

                        <div class="clear"></div>

                        

                        <label class="label_title">Email:</label>

                        <input name="email" id="email" type="email" class="sidebar_input validate[required,custom[email]]" >

                        <div class="clear"></div>

                        

                        <label class="label_title">Address:</label>

                        <textarea name="address" id="address" type="text" class="sidebar_input validate[required] text-input" ></textarea>

                        <div class="clear"></div>

                       

                        

                         

                         

                    </div>

                       <div class="row">

                        <input type="submit"  class="btn-submit btn_send" value="Submit" tabindex="100" onclick="validation1()">

                        </div>

                    

                    </form>

	         

                

            <div class="box_bot"></div>

            </div>

            

                

        </div>

       

              

    </div>

</div>



@stop