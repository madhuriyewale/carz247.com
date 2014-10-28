<?php

class InternationalBookingController extends BaseController {
    

     public function international_bookings() {
        return View::make('frontend.pages.international_bookings');
    }
    
    
       public function international_listings() {
        return View::make('frontend.pages.international_listings');
    }
    
}
