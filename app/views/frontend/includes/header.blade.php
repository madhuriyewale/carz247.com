<div class="container">
    <div class="logo">
        <a href="/">{{ HTML::image('public/frontend/images/logo.png' ,'Carz247') }}</a>
    </div>
    <!-- topmenu -->    
    <nav id="topmenu" class="clearfix">  
        @if (Session::has('email'))

        <ul class="dropdown">  
            <li class="menu-level-0"><a href="#" ><span><i class="fa fa-user"></i> Hi {{ Session::get('fname');  }}</span></a>
                <ul class="submenu-1">
                    <li class="first"><a class="gray" href="{{ URL::route('edit_profile'); }}" hidefocus="true" style="outline-style: none; outline-width: initial; outline-color: initial; "><span>Edit Profile</span></a></li>
                    <li class="last"><a class="gray" href="{{ URL::route('change-password');}}" hidefocus="true" style="outline-style: none; outline-width: initial; outline-color: initial; "><span>Change Password</span></a></li>
                </ul>
            </li>
            <li class="menu-level-0"><a href="{{ URL::route('logout'); }}"><span><i class="fa fa-sign-in mr05"></i>Logout </span></a></li> 
            <li class="menu-level-0"><a href="#"><span><i class="fa fa-mobile mr05"></i> +91 7666 947 247</span></a></li>                                
        </ul> 

        @else
        <ul class="dropdown">    
            <li class="menu-level-0"><a href="{{ URL::route('login'); }}"><span><i class="fa fa-sign-in mr05"></i>Login </span></a></li> 
            <li class="menu-level-0"><a href="{{ URL::route('register'); }}"><span><i class="fa fa-users mr05"></i>  Register</span></a></li>       
            <li class="menu-level-0"><a href="#"><span><i class="fa fa-mobile mr05"></i> +91 7666 947 247</span></a></li>                                
        </ul> 
        @endif

    </nav>    
    <!--/ topmenu -->
</div>