@extends('frontend.layouts.default')

<head>

    <title>Carz247 - Rent A Car</title>

    <meta name="description" content="Call +91-7666947247 and book your car now! Carz247 is a car rental service for Delhi, Mumbai, Bangalore, Hyderabad, Gurgaon, Noida and Pune locations.">

    <meta name="keywords" content="rent car,carz247,self drive car rent mumbai,car rental">

    <meta name="author" content="Infini Systems">

    <meta charset="UTF-8">

</head>

@section('content')





<!-- header -->



<style type="text/css">







    .search_row .row .form-control{width:144px;}



    .tp-caption.white_text.big_title a{text-shadow:none; color:#323232;}



    .border-right{border-right: 1px solid #f1f1f1;}
    .int_booking{font-size: 14px;
                 padding: 10px 15px;
                 //height: 44px;
                 color: #4f5e62 !important;
                 text-shadow: 0 1px 1px #fff;
                 text-decoration: none;
                 text-transform: uppercase;
                 background: none;
                 font-weight: 500;
                 font-family: 'Cabin', sans-serif;
                 display: inline-block;
    }
    .int_booking a{color: #4f5e62 !important;}
    .int_booking:hover{background: #ed3237 ;color: #fff!important;
    }
    .int_booking a:hover{color: #fff!important;}

</style>



<div class="header"  style="background:#f0f3f5;">







    <!-- header slider -->



    <div class=""> 

        <div>









            {{ HTML::image("public/frontend/images/car-bg.jpg" ,'Carz247',array("class"=>"carz bgtab", "data-fullwidthcentering" => "on")) }}











            <div class="tabs_framed tf_sidebar_tabs hometab container" >







                <ul class="tabs">



                    <li class=" border-right"><a href="#tabs_1_1"><i class="fa fa-tachometer"></i> Local</a></li>



                    <li class=" border-right"><a href="#tabs_1_2"> <i class="fa fa-map-marker"></i> Outstation</a></li>



                    <li class=" border-right"><a href="#tabs_1_3"> <i class="fa fa-plane"></i> Airport Transfer </a></li>

                    <div class="int_booking"><a href="{{ URL::route('international-booking');}}"  target="_blank"> <i class="fa fa-globe"></i> Self  Drive</a> </div>



                </ul>







                <div id="tabs_1_1" class="tabcontent">



                    <div class="inner search_row">



                        <form action="local" method="post" class="search_form advsearch_hide clearfix" >











                            <div class="adv_search_hidden clearfix">







                                <div class="row field_select">



                                    <label class="label_title">From</label>







                                    <select class="select_styled validate[required]" name="city_id" >



                                        <option value="">Please Select </option>



                                        @foreach ($localCities as $city)







                                        <option value="{{ $city->id }}">{{ $city->city}}</option>



                                        @endforeach







                                    </select>



                                </div>







                                <div class="row field_select">



                                    <label class="label_title">Package</label>







                                    <select class="select_styled validate[required]" name="package_id">



                                        <option value="">Please Select </option>



                                        @foreach ($localPackages as $package)



                                        <option value="{{ $package->id }}">{{ $package->package }}</option>



                                        @endforeach







                                    </select>



                                </div>







                                <div class="row field_select">



                                    <label class="label_title">Date</label>



                                    <input type="text" name="fromDate" class="form-control datepicker validate[required]" name="date" placeholder="Please Select" autocomplete="off" readonly="readonly"/>



                                </div>



                            </div>







                            <div class="row rowSubmit">



                                <label class="label_title" id="adv_search_open">&nbsp;</label>



                                <input type="hidden" name="service_id" value="1" />



                                <span class="btn btn_search btn_red"><input type="submit" value="Book Now"></span>



                            </div>



                        </form>                    		



                    </div>



                </div>







                <div id="tabs_1_2" class="tabcontent">



                    <div class="inner search_row">



                        <form action="outstation" method="post" class="search_form advsearch_hide clearfix">











                            <div class="adv_search_hidden clearfix">







                                <div class="row field_select">



                                    <label class="label_title">From</label>



                                    <select class="select_styled validate[required]" name="city_id" >



                                        <option value="">Please Select </option>



                                        @foreach ($outstationCities as $city)











                                        <option value="{{ $city->id }}">{{ $city->city}}</option>



                                        @endforeach







                                    </select>



                                </div>







                                <div class="row field_select">

                                    <label class="label_title">Travel To</label>

                                    <input type="text" name="toCity" class="form-control validate[required] input-text" id="travel_to" placeholder="Enter the city" />

                                </div>







                                <div class="row field_select">



                                    <label class="label_title">Start Date</label>



                                    <input type="text" name="fromDate" id="fromDate" class="form-control validate[required]" placeholder="Please Select"  readonly="readonly" autocomplete="off" >



                                </div>







                                <div class="row field_select">



                                    <label class="label_title">End Date</label>



                                    <input type="text" name="toDate" id="toDate" class="form-control validate[required]" placeholder="Please Select" readonly="readonly" autocomplete="off" required>



                                </div>











                            </div>







                            <div class="row rowSubmit">



                                <label class="label_title" id="adv_search_open">&nbsp;</label>



                                <input type="hidden" name="service_id" value="2" />



                                <input type="hidden" name="package_id" value="0" />



                                <span class="btn btn_search btn_red"><input type="submit" value="Book Now"></span>



                            </div>



                        </form>                    		



                    </div>



                </div>







                <div id="tabs_1_3" class="tabcontent">



                    <div class="inner search_row">



                        <form action="airport-transfer" method="post" class="search_form advsearch_hide clearfix">











                            <div class="adv_search_hidden clearfix">







                                <div class="row field_select">



                                    <label class="label_title">From</label>



                                    <select class="select_styled validate[required]" name="city_id">



                                        <option value="">Please Select </option>



                                        @foreach ($airportCities as $city)







                                        <option value="{{ $city->id }}">{{ $city->city}}</option>



                                        @endforeach







                                    </select>







                                </div>







                                <div class="row field_select">



                                    <label class="label_title">Date</label>



                                    <input type="text" name="fromDate" class="form-control datepicker validate[required]" placeholder="Please Select" readonly="readonly" autocomplete="off" required>



                                </div>







                            </div>







                            <div class="row rowSubmit">



                                <label class="label_title" id="adv_search_open">&nbsp;</label>



                                <input type="hidden" name="service_id" value="3" />



                                <span class="btn btn_search btn_red"><input type="submit" value="Book Now"></span>



                            </div>



                        </form>                    		



                    </div>



                </div>







            </div>















        </div>          



    </div>



    <script>



        jQuery(document).ready(function($) {







        if ($.fn.cssOriginal != undefined)



                $.fn.css = $.fn.cssOriginal;
                $('.fullwidthbanner').revolution({



        delay: 5000,
                startwidth: 950,
                startheight: 617,
                onHoverStop: "off", // Stop Banner Timet at Hover on Slide on/off



                hideThumbs: 0,
                navigationType: "bullet", // bullet, thumb, none



                navigationArrows: "none", // nexttobullets, solo (old name verticalcentered), none







                navigationStyle: "round", // round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom







                navigationHAlign: "center", // Vertical Align top,center,bottom



                navigationVAlign: "bottom", // Horizontal Align left,center,right



                navigationHOffset: 0,
                navigationVOffset: 23,
                touchenabled: "on", // Enable Swipe Function : on/off







                stopAtSlide: - 1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.



                stopAfterLoops: - 1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic







                hideCaptionAtLimit: 0, // It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)



                hideAllCaptionAtLilmit: 0, // Hide all The Captions if Width of Browser is less then this value



                hideSliderAtLimit: 0, // Hide the whole slider, and stop also functions if Width of Browser is less than this value







                fullWidth: "on",
                shadow: 0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)







        });
        });</script>



    <!--/ header slider -->







</div>



<!--/ header -->







<div class="middle_row row_light_gray">



    <div class="container clearfix">  



        <!-- week offer -->



        <div class="week_offer">



            <h2>Current Offer</h2>



            <div class="offer_box">



                <div class="offer_image"><a href="javascipt:void();">{{ HTML::image('public/frontend/images/week_offer.jpg' ,'Current Offer') }}</a></div>



                <div class="offer_text">



                    <h3><a href="javascipt:void();" class="cred">Rs. 1 off for every second kilometer that you travel with us.</a></h3>



                    <div class="offer_descr">



                        You can now book a car from us and pay up to 10% less. For every second kilometer you travel with us, we shall charge you Rs. 1 less.



                    </div>



                </div>



            </div>



        </div>



        <!--/ week offer -->



        <!-- special offer -->



        <div class="special_offers">



            <h2>Fleet Of Cars</h2>







            <div id="special_offers">



                @foreach($categories as $category) 



                <div class="special_item">



                    <div class="special_image">



                        <a href="javascript:void();">{{ HTML::image('public/frontend/images/car-uploads/'.$category->image , $category->category) }}</a>



                    </div>



                    <div class="special_text">



                        <h3><a href="offers-details.html">{{ $category->category }}</a></h3>



                        <div class="info_row"><span>CAR MODELS :</span>  <?= implode(", ", json_decode($category->cars, true)) ?> </div>



                        <div class="info_row"><span>SEATING TYPE :</span> {{ $category->seats }}</div>



                        <div class="special_price"><i class="fa fa-inr"></i> {{ $category->extra_km_cost }} per km Onwards</div>



                    </div>



                </div>



                @endforeach 



            </div>



            <a class="prev" id="special_offers_prev" href="#"></a>



            <a class="next" id="special_offers_next" href="#"></a>



            <script>



                        jQuery(document).ready(function($) {



                function carSpecicalInit() {



                var car_specical = $('#special_offers');
                        car_specical.carouFredSel({



                        prev: "#special_offers_prev",
                                next: "#special_offers_next",
                                infinite: true,
                                circular: false,
                                auto: false,
                                width: '100%',
                                direction: "down",
                                scroll: {



                                items: 1



                                }



                        });
                }



                $(window).load(function() {



                carSpecicalInit();
                });
                        var resizeTimer;
                        $(window).resize(function() {



                clearTimeout(resizeTimer);
                        resizeTimer = setTimeout(carSpecicalInit, 100);
                });
                });</script> 



        </div>           



        <!--/ special offer -->			



    </div>



</div>







<!-- testimonials -->



<div class="middle_row row_white testimonials">



    <div class="container">







        <div class="slider_container clearfix" id="testimonials">                      	 



            <div class="slider-item">



                <div class="quote-text">



                    <p>Their cars are better than any other cabs available on rent.</p>



                </div>



                <div class="quote-author"><span>Dr. Sandeeep Goankar</span></div>                 



            </div>



            <div class="slider-item">



                <div class="quote-text">



                    <p>It is really easy to rent a car online. Your website is very user friendly and has various options.



                    </p>



                    <p>Good job!</p>



                </div>



                <div class="quote-author"><span>Shrikanth Soman</span></div>



            </div>



            <div class="slider-item">



                <div class="quote-text">



                    <p>Music played in the car was superb!</p>



                </div>



                <div class="quote-author"><span>Pramod Singh</span></div>



            </div>	



            <div class="slider-item">



                <div class="quote-text">



                    <p>Waiting for Self Drive facility, kindly contact me as soon as you start.</p>



                </div>



                <div class="quote-author"><span>Chintan Desai</span></div>



            </div>



            <div class="slider-item">



                <div class="quote-text">



                    <p>Confirmed everything on email and SMS. Thanks.</p>



                </div>



                <div class="quote-author"><span>Hardik Mehta</span></div>



            </div>



            <div class="slider-item">



                <div class="quote-text">



                    <p>Very well maintained car</p>



                </div>



                <div class="quote-author"><span>Ram Dharia</span></div>



            </div>



            <div class="slider-item">



                <div class="quote-text">



                    <p>Driver was very punctual & Courteous!!!</p>



                </div>



                <div class="quote-author"><span>Parikh Shukla</span></div>



            </div>



            <div class="slider-item">



                <div class="quote-text">



                    <p>Driver was very clever. He knew all the roads.</p>



                </div>



                <div class="quote-author"><span>Abhijeet Sharma</span></div>



            </div>                        



            <div class="slider-item">



                <div class="quote-text">



                    <p>Awesome Service!</p>



                </div>



                <div class="quote-author"><span>Atul Rambhia</span></div>



            </div>                        



            <div class="slider-item">



                <div class="quote-text">



                    <p>Very well maintained cars. Keep it up!</p>



                </div>



                <div class="quote-author"><span>Prashant Nair</span></div>



            </div>                     	                        



        </div>



        <a class="prev" id="testimonials_prev" href="#"></a>



        <a class="next" id="testimonials_next" href="#"></a>



        <script src="http://carz247.boxcommerce.in/public/frontend/js/jquery.tools.min.js"></script>



        <script>



                        var cities_names = {{ $allCities }}



                jQuery(document).ready(function($) {



                $('#testimonials').carouFredSel({



                next: "#testimonials_next",
                        prev: "#testimonials_prev",
                        infinite: false,
                        items: 1,
                        auto: true,
                        scroll: {



                        items: 1,
                                fx: "crossfade",
                                easing: "linear",
                                duration: 300



                        }



                });
                });



        </script>    







    </div>



</div>



<!--/ testimonials -->



@stop