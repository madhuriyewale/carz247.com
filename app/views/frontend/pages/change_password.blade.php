@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg  header_thin" >
    <div class="header_title">
        <strong> Change <span>Passowrd</span>   </strong>
    </div>
</div>
<div id="middle" class="full_width">
    <div class="container clearfix">  

        <!-- content -->
        <div class="content">

            <!-- offers list -->

            <div class="row new_fullbg clearfix" style="background: #fff;">


                <form name="change_password" action="{{ URL::route('check_change_password') }}" method="post" class="loginform">

                    <div class="col col_1_2 alpha">
                        <!-- login widget -->
                        <div class="widget-container">




                            <div class="padding15">

                                <div id="reg_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#FF0000"></div> 
                                <p><label>Current password </strong><SPAN><B>*</B></SPAN></label> <br> <input type="password" name="currentPassword" id="current" class="input w_100"></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>		

                    <div class="col col_1_2 alpha">
                        <div class="widget-container">

                            <div class="padding15">
                                <p><label>New password </strong><SPAN><B>*</B></SPAN></label><br><input type="password" name="newPassword" id="password" class="input w_100"></p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>	

                    <div class="col col_1_2 alpha">
                        <div class="widget-container">
                            <div class="padding15">
                                <p><label>Confirm password </strong><SPAN><B>*</B></SPAN></label><br><input type="password" name="NewConfirmPassword" id="cpass" class="input w_100"></p>	
                            </div>
                        </div>
                    </div>


                    <div class="clear"></div>		
                    <div class="padding15">
                        <p class="submit">
                            <input  type="submit" class="btn-submit" value="Submit" tabindex="100" style="opacity: 1; ">

                        </p>


                    </div>
                    </form>
            </div>
            <!--/ login widget -->       
        </div>    


        <div class="col col_1_2 omega">

        </div>
    </div>
</div>

<!--/ testimonials -->
@stop