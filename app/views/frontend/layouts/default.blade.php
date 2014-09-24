<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        @include('frontend.includes.head')
    </head>

    <body>
        <div class="body_wrap homepage">

            <!-- header top bar -->
            <div class="header_top">
                @include('frontend.includes.header')
            </div>
            <!--/ header top bar -->



            <!-- middle -->
            @yield('content')
            <!--/ middle -->


            <div class="footer">
                @include('frontend.includes.footer')
            </div>

        </div>
        @include('frontend.includes.foot')
    </body>
</html>