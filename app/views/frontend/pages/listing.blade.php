@extends('frontend.layouts.default')
@section('content')
<div class="header listing-bg header_thin">            
    <div class="header_title">
        <strong> 
            <span><i class="fa fa-car"></i> STEP 1</span>
            <i class="fa fa-chevron-right"></i> <i class="fa fa-pencil-square-o"></i> STEP 2 
            <i class="fa fa-chevron-right"></i> <i class="fa fa-thumbs-up"></i> STEP 3
        </strong>
    </div>
</div>
<div id="middle" class="full_width">
    <div class="container clearfix">  
        <!-- content -->
        <div class="content">
            <div class="title2">
                @if(empty($listings))
                <h3>Sorry!! We have no service for this specific criteria!!</h3>
                @else 
                <h2 class="manage_title">You are looking for {{ @$listings[0]['service'] }} Car  usage {{ isset($listings[0]['package']) ? "for " . $listings[0]['package'] : ""  }} in {{ @$listings[0]['city'] }} on {{ Session::get('fromDate') }}</h2>	
                <h3>Please select your Car category.</h3>
                @endif
            </div>
            <!-- offers list -->

            @foreach($listings as $listing) 
            <div class="row search_item clearfix">
                <div class="col col_1_3  alpha">
                    <div class="search_image">
                        {{ HTML::image('public/frontend/images/car-uploads/'.$listing['image'] , $listing['category']) }}
                    </div>
                </div>
                <div class="col col_2_3  omega">
                    <div class="search_aisde">
                        <div class="search_title">
                            <h2><a href="#" >{{ $listing['category'] }}</a></h2>
                            <div class="alignright">Base Cost :   <i class="fa fa-inr"></i> {{ number_format($listing['base_cost']) }}</div>
                        </div>
                        <div class="search_descr">
                            <p> <span class="search_descr_b">Seating Type :</span> {{ $listing['seats'] }}</p>
                            <p> <span class="search_descr_b">Car Models : </span> <?= implode(", ", json_decode($listing['cars'], true)) ?> </p>
                        </div>
                        <div class="search_book">
                            <a href="/booking/{{ $listing['id'] }}/" class="btn btn_red alignright" ><span>Book Now</span></a> 
                            <div id="item-{{ $listing['id'] }}" onclick="show('details-{{ $listing['id'] }}')" class="create-user btn btn_gray alignright mr10"><span>Details</span></div>
                            <div class="clear"></div>
                            <div id="details-{{ $listing['id'] }}" style="display:none;" class="mt30">
                                <h2 class="tcol_red">Fare Details</h2>
                                <div>
                                    <div><h3 class="widget-title">Base Cost: <i class="fa fa-inr"></i>{{ number_format($listing['base_cost']) }}</h3> </div>
                                    <div class="styled_table table_dark">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th style="width:50%">Inclusions</th>
                                                    <th style="width:50%">Exclusions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <div class="booking_sum"><span>Kilometers: </span>{{ $listing['min_kms'] }} Kms</div></td>
                                                    <td> <div class="booking_sum"><span>Service Tax, Toll, Parking  </span> </div></td>
                                                </tr>
                                                <tr class="odd">
                                                    <td> <div class="booking_sum"><span>Hours: </span>{{ $listing['min_hrs'] }} Hrs</div></td>
                                                    <td><div class="booking_sum"><span>Extra Km. beyond {{ $listing['min_kms'] }} Kms: </span> <i class="fa fa-inr"></i> {{ $listing['extra_km_cost'] }} per Km.</div></td>
                                                </tr>
                                                <tr>
                                                    <td><div class="booking_sum"><span>Chauffeur </span></div></td>
                                                    <td><div class="booking_sum"><span>Extra Hours beyond {{ $listing['min_hrs'] }} Hrs: </span> <i class="fa fa-inr"></i> {{ $listing['extra_hr_cost'] }} per Hour</div></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- offers list -->
        </div>
        <!--/ content -->
    </div>
</div>
<script>
            function show(id) {
            var e = document.getElementById(id);
                    if (e.style.display == 'block')
                    e.style.display = 'none';
                    else
                    e.style.display = 'block';
            }
    function hide(id) {
    document.getElementById(id).style.visibility = "visible";
    }
</script>

@stop