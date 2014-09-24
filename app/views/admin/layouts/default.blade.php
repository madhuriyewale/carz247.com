<!DOCTYPE html>
<html>
    <head>
        @include('admin.includes.head')
    </head>

    <body class="skin-blue">

        <!-- header top bar -->
        <header class="header">
            @include('admin.includes.header')
        </header>
        <!--/ header top bar -->



        <!-- middle -->
        <div class="wrapper row-offcanvas row-offcanvas-left">
            @include('admin.includes.sidebar')
            @yield('content')
        </div>
        <!--/ middle -->


        <div class="footer">
            @include('admin.includes.footer')
        </div>


        @include('admin.includes.foot')
    </body>
</html>