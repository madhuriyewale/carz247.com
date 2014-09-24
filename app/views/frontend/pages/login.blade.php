@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg  header_thin" >

  <div class="header_title">
        
   
        <strong> Login </strong>
            </div>

</div>
<div id="middle" class="full_width">
        <div class="container clearfix">  
            <!-- content -->
            <div class="content">
     
             @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif

                <!-- offers list -->

                <div class="row new_fullbg clearfix bg_login">
                    <div class="col col_1_2 alpha">
                        <!-- login widget -->
                        <div class="padding15">
                            <div class="widget-container widget_login ">
                            
                                
                                <div class="pl15"><h3 class="mb0">Login </h3></div>
                                <div id="login_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div>
                                <form method="post" action="{{ URL::route('check_login'); }}" class="loginform" id="loginform" >

                                    <div style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div> 
                                    
                                    <p><label>Username</label><br><input name="email" id="email" class="input" value="" size="20" tabindex="10" type="text" required="true"></p>								
                                    <p><label>Password</label><br><input name="password" id="password" class="input" value="" size="20" tabindex="20" type="password" required="true"></p>								
                                    <div class="forgetmenot input_styled checklist">

                                    </div>								
                                    <p class="forget_password"><a href="{{ URL::route('forgot_password'); }}" name="forgot" id="forgot" hidefocus="true" style="outline-style: none; outline-width: initial; outline-color: initial; ">Forgot Password?  </a></p> <div class="clear"></div>
                                
                                    <p class="submit">
                                        <input type="submit" name="submit" id="submit" class="btn-submit btn_send" value="Login" tabindex="100">

                                    </p>
                                </form>
                            </div>
                            <!--/ login widget -->    
                        </div>   
                    </div>    

                    <div class="col col_1_2 omega">
                        <img src="/public/frontend/images/login.png">
                        <!-- content slider: slider_medium -->
                        <!--<div class="slider slider_small">
                            <div class="slider_container clearfix" id="slider4">	                                                    
                                <div class="slider-item"><img src="http://carz247.com//images/login.png" alt=""></div>	                        
                                <div class="slider-item"><img src="http://carz247.com//images/category/comfort_1.jpg" alt=""></div>	                        
                            <div class="slider-item"><img src="http://carz247.com//images/category/spluxury_1.jpg" alt=""></div>                           
                            </div>
                            
                        </div>--> 
                        <script>
                            jQuery(document).ready(function($) {
                                $('#slider4').carouFredSel({
                                    pagination: "#slider4_pag",
                                    infinite: false,
                                    auto: true,
                                    height: "auto",
                                    items: 1,
                                    scroll: {
                                        fx: "fade",
                                        duration: 600
                                    }
                                });
                            });
                        </script>
                        <!-- content slider: medium_small -->

                    </div>
                </div>
            </div>

    

    </div>
    <!--/ content -->

</div>

<!--/ testimonials -->
@stop