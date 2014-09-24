@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg  header_thin" >

    <div class="header_title">
        <h1>Find out more <span>about us</span></h1>
    </div>

</div>
<div id="middle" class="full_width">
    <div class="container clearfix">  

        <!-- content -->
        <div class="content">            

            <div class="entry">

                <div class="col col_2_3">
                    <h2>Overview</h2>

                    <p class="jstfy">Founded in 1975, Carz247 (formerly known as Ajanta Travels) is a recognized brand with a network of more than 250 neighborhood vendors in India. Through tremendous leadership and the entrepreneurial spirit of our employees, we have built a well organized network of rental cars all across India, known for exceptionally low rates and outstanding customer service. </p>

                    <p class="jstfy">Today, Carz247 offers a wide variety of services which include chauffeur driven car leasing, self drive car rentals and hourly rental programs. Carz247 is now going to operate as a full fledged ecommerce service in association with its sister concern company - Infini Systems Pvt. Ltd. which has strong presence in the Indian ecommerce industry.</p> 

                    <div class="divider_space_thin"></div>

                </div>
                <div class=" col col_1_3">
                    <h2>&nbsp;</h2>
                   {{ HTML::image('public/frontend/images/about.jpg' ) }}
                </div>



            </div>                

        </div>
        <!--/ content -->


    </div>
</div>

<!--/ testimonials -->
@stop