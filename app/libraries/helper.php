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

    public static function all_orders() {
        return $all_orders = Booking::count();
    }

    public static function all_users() {

        return $all_users = Customer::count();
    }

    public static function all_venders() {
        return $all_venders = Vender::count();
    }

    public static function all_enquiries() {

        return $all_contacts = Contact::count();
    }

    public static function all_booking_for_calendar() {
        $booking_calender = DB::select(DB::raw("select CONCAT_WS(' ',cities.city, services.service, categories.category, packages.package) title, bookings.start_date start,bookings.end_date end from `bookings` left join `customers` on `customers`.`id` = `bookings`.`customer_id` left join `localities` on `localities`.`id` = `bookings`.`locality_id` left join `listings` on `listings`.`id` = `bookings`.`listing_id` left join `services` on `services`.`id` = `listings`.`service_id` left join `cities` on `cities`.`id` = `listings`.`city_id` left join `packages` on `packages`.`id` = `listings`.`package_id` left join `categories` on `categories`.`id` = `listings`.`category_id` left join `venders` on `venders`.`id` = `bookings`.`vender_id`"));
        return json_encode($booking_calender);
    }

    public static function sales_summary() {
        $sales_summary = DB::select(DB::raw("SELECT MONTHNAME(STR_TO_DATE(Month(modified),'%m')) month, sum(final_amt) sales FROM `bookings` where booking_status = 3 group by Month(modified)"));

        return json_encode($sales_summary);
    }

     public static function booking_summary() {
        $booking_summary = DB::select(DB::raw("SELECT MONTHNAME(STR_TO_DATE(Month(modified),'%m')) month, count(*) bookings FROM `bookings` where booking_status = 3 group by Month(modified)"));

        return json_encode($booking_summary);
    }
}
