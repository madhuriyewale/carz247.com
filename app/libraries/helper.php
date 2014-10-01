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
        $booking_calender = DB::select(DB::raw("select CONCAT_WS(' ',cities.city, services.service, categories.category, packages.package) title, bookings.start_date start,bookings.end_date end, (
    CASE services.id
        WHEN '1' THEN '#f56954'
        WHEN '2' THEN '#00a65a'
        WHEN '3' THEN '#0073b7'
        ELSE '#0073b7'
    END) as backgroundColor, '#fff' as borderColor, '/admin/orders' as url from `bookings` left join `customers` on `customers`.`id` = `bookings`.`customer_id` left join `localities` on `localities`.`id` = `bookings`.`locality_id` left join `listings` on `listings`.`id` = `bookings`.`listing_id` left join `services` on `services`.`id` = `listings`.`service_id` left join `cities` on `cities`.`id` = `listings`.`city_id` left join `packages` on `packages`.`id` = `listings`.`package_id` left join `categories` on `categories`.`id` = `listings`.`category_id` left join `venders` on `venders`.`id` = `bookings`.`vender_id`"));
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

    public static function service_local_summary() {
        $service_local_summary = DB::select(DB::raw("select MONTHNAME(STR_TO_DATE(Month(bookings.modified),'%m')) y, sum(bookings.final_amt) Sale from bookings,listings where bookings.listing_id=listings.id and listings.service_id=1 group by Month(bookings.modified)"));
        return json_encode($service_local_summary);
    }

    public static function service_outstation_summary() {
        $service_outstation_summary = DB::select(DB::raw("select MONTHNAME(STR_TO_DATE(Month(bookings.modified),'%m')) month, sum(bookings.final_amt) sale from bookings,listings where bookings.listing_id=listings.id and listings.service_id=2 group by Month(bookings.modified)"));
        return json_encode($service_outstation_summary);
    }

    public static function service_airport_summary() {
        $service_airport_summary = DB::select(DB::raw("select MONTHNAME(STR_TO_DATE(Month(bookings.modified),'%m')) month, sum(bookings.final_amt) sale from bookings,listings where bookings.listing_id=listings.id and listings.service_id=3 group by Month(bookings.modified)"));
        return json_encode($service_airport_summary);
    }

    public static function all_service_summary() {
        $all_service_summary = DB::select(DB::raw("select  services.service label, sum(bookings.final_amt) value from bookings,listings,services where bookings.listing_id=listings.id and
listings.service_id=services.id
group by services.service"));
        return json_encode($all_service_summary);
    }

    public static function booking_status($id) {
        $status = ['Received', 'Confirmed', 'Allocated', 'Completed', 'Cancelled'];
        return $status[$id];
    }

    public static function sendSMS($to, $message) {
        // create curl resource 
        $ch = curl_init();

        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?feedid=345549&To=$to&Text=" . urlencode($message) . "&mtype=1&username=7666947247&password=gjpwg");

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($ch);

        // close curl resource to free up system resources 
        curl_close($ch);

        return $output;
    }

}
