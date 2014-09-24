@extends('frontend.layouts.default')
@section('content')
<div style="background-image:url(images/temp/slider_1_1.jpg)" class="header header_thin">

    <div class="header_title">
        <strong> Reset <span>Password</span>   </strong>
    </div>

</div>


<div class="full_width" id="middle">
    <div class="container clearfix">  
        <!-- content -->
        <div class="content">
            
             @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif


            <!-- offers list -->

            <div style="background:#fff; padding:15px;" class="row new_fullbg clearfix">
                <div class="col col_1_2 alpha">
                    <!-- login widget -->
                    <div class="widget-container widget_login">
                        <h3>Reset Password</h3>

                        <form class="loginform" method="post" action="{{URL::route('check_reset_password')}}">
                           <input type="hidden"  value="{{ $email }}"  name="email"></p>								

                            <p><label>New Password</label><br><input type="password" tabindex="20" size="20" value="" class="input" id="password" name="newPassword"></p>								
                            <p><label>Confirm Password</label><br><input type="password" tabindex="20" size="20" value="" class="input" id="cpass" name="newConfirmPassword"></p>								


                            <p class="submit">
                                <input type="submit" tabindex="100" value="Submit" class="btn-submit" id="reset" name="reset" style="opacity: 1;">

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