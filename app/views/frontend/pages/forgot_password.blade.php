@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg  header_thin" >

    <div class="header_title">
        <strong> Reset <span>Password</span>   </strong>
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

            <div class="row new_fullbg clearfix" style="background:#fff; padding:15px;">
                <div class="col col_1_2 alpha">
                    <!-- login widget -->
                    <div id="forgot_error" style="margin:15px 0px 0 8px;width:auto; font-size:14px; color:#3BB3C2"></div>

                    <div class="widget-container widget_login">

                        <h2>Enter your Email ID</h2>
                        <form action="{{ URL::route('check_forgot_password'); }}" method="post" class="loginform">								
                            <p><label>Email </strong><SPAN><B>*</B></SPAN></label><br><input name="email" id="email" class="input validate[required] text-input"  size="20" tabindex="10" type="text" ></p>								


                            <p class="submit">
                                <input type="submit" name="forgot" id="forgot" class="btn-submit" value="Submit" tabindex="100">

                            </p>
                        </form>
                    </div>
                    <!--/ login widget -->       
                </div>    

                <div class="col col_1_2 omega">

                </div>
            </div>
        </div>




    </div>
    <!--/ content -->

</div>
<!--/ testimonials -->
@stop