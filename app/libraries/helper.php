<?php

class Helper {

    public static function orders_count() {
        return $received_count = Booking::where('booking_status', "=", 0)->count();
    }

    public static function careers_count() {
        return $read_count = Career::where('read', "=", 0)->count();
    }

    public static function contact_count() {
        return $read_count = Contact::where('read', "=", 0)->count();
    }

    public static function partner_count() {
        return $read_count = Partner::where('read', "=", 0)->count();
    }

}
