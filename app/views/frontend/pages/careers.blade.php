@extends('frontend.layouts.default')

@section('content')

<div class="header listing-bg  header_thin" >



    <div class="header_title">

        <h1>Work with <span>Us</span></h1>

    </div>



</div>



<div id="middle" class="cols2">

	<div class="container clearfix">  

		<!-- content -->

        <div class="content">

        	

            <!-- posts list -->

            <div class="postlist">

            	

                <div class="post-item">

                	

                    <div class="post-aside clearfix ">

	                    <div class="entry">

	                    	<p class="padding10 jstfy">Carz247 is Mumbai's one of the biggest car rental company. We are working on our mission to provide the best car rental experience to the customers and are looking forward for likeminded people to join us. We are based in Mumbai.<br>

	                    	If you love solving interesting problems and want to be a part of success story, send us your resumes to <a href="#" hidefocus="true" style="outline-style: none; outline-width: initial; outline-color: initial; ">careers@carz247.com </a>and tell us why you are unique and how you can contribute. </p>

                        </div>  

                        <div class="post-image margin0"><a href="blog-details.html" hidefocus="true" style="outline-style: none; outline-width: initial; outline-color: initial; "><img src="http://carz247.com//images/careers.jpg" alt=""></a></div>    

                    </div>                

                </div>

                

                

            </div>

            <!--/ posts list -->

            

            

        </div>

        <!--/ content -->

        

        <!-- sidebar -->

        <div class="sidebar">

        	<div class="box">

               

                

                <!-- widget_tag_cloud -->

		          	

	                <h3 class="widget-title mb0 padding15">Careers</h3>

	        

                <form action="{{URL::route('save_career');}}" method="post" id="careerForm" class="side_form" enctype="multipart/form-data">

                    <div class="row">

                        <label class="label_title">Full Name:</label>

                        <input name="contact_person" id="contact_person" type="text" class="sidebar_input" required="true">

                        <div class="clear"></div>

                          <label class="label_title">Email:</label>

                        <input name="email" id="email" type="email" class="sidebar_input" required="true">

                        <div class="clear"></div>

                        <label class="label_title">Mobile Number:</label>

                        <input name="mobile" id="mobile" type="number" class="sidebar_input" required="true">

                        <div class="clear"></div>

                         <label class="label_title">Upload your resume:</label>

                         <input type="file" name="resume" id="userfile" required="true">

                       <label class="label_title">Remark:</label>

                        <input name="remarks" id="remark" type="text" class="sidebar_input" required="true">

                        <div class="clear"></div>

                        

                    </div>

                       <div class="row">

                        <input type="submit"  class="btn-submit btn_send" value="Submit" tabindex="100">

                        </div>

                    

                    </form>

	            <!--/ widget_tag_cloud -->

                

            <div class="box_bot"></div>

            </div>

            

                

        </div>

        <!--/ sidebar -->  

              

    </div>

</div>



<!--/ testimonials -->

@stop