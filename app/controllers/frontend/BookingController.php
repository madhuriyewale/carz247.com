<?php

class BookingController extends BaseController {

    public function booking($id) {
        $listing = Listing::leftJoin("services", "services.id", "=", "listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "listings.category_id")
                        ->where("listings.id", '=', $id)->get(['listings.*', 'cities.city', 'packages.package', 'services.service', 'categories.category', 'categories.image'])->toArray();
        $days = 1;
        if ($listing[0]["service_id"] == 2) {
            $fromDate = new DateTime(Session::get("fromDate"));
            $toDate = new DateTime(Session::get("toDate"));
            $days = $toDate->diff($fromDate)->format("%a") + 1;
            $listing[0]["base_cost"] = $listing[0]['min_kms'] * $listing[0]['extra_km_cost'] * $days + $days * $listing[0]['driver_cost'];
            $listing[0]["min_kms"] = $listing[0]["min_kms"] * $days;
        }



        $localities = Locality::where("city_id", "=", Session::get('city_id'))->get();



        return View::make('frontend.pages.booking', compact('listing', 'localities', 'days'));
    }

    public function payment() {



        $bookingDetails = Booking::leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                        ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                        ->where("bookings.id", '=', Session::get('booking_id'))->get(["customers.*", "localities.locality", "bookings.*"])->toArray();



        $listing = Listing::leftJoin("services", "services.id", "=", "listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "listings.category_id")
                        ->where("listings.id", '=', $bookingDetails[0]['listing_id'])->get(['listings.*', 'cities.city', 'packages.package', 'services.service', 'categories.category', 'categories.image'])->toArray();

        $days = 1;
        if ($listing[0]["service_id"] == 2) {
            $fromDate = new DateTime(Session::get("fromDate"));
            $toDate = new DateTime(Session::get("toDate"));
            $days = $toDate->diff($fromDate)->format("%a") + 1;
            $listing[0]["base_cost"] = $listing[0]['min_kms'] * $listing[0]['extra_km_cost'] * $days + $days * $listing[0]['driver_cost'];
            $listing[0]["min_kms"] = $listing[0]["min_kms"] * $days;
            Session::put('baseCost', $listing[0]["base_cost"]);
        } else {
            Session::put('baseCost', $listing[0]["base_cost"]);
        }


        $payment['orderAmount'] = $bookingDetails[0]['cost'];
        $payment['merchantTxnId'] = Session::get('booking_id');
        $payment['addressState'] = '';
        $payment['addressCity'] = 'Mumbai';
        $payment['addressStreet1'] = $bookingDetails[0]['locality'];
        $payment['addressCountry'] = 'India';
        $payment['addressZip'] = $bookingDetails[0]['zipcode'];
        $payment['firstName'] = $bookingDetails[0]['fname'];
        $payment['lastName'] = $bookingDetails[0]['lname'];
        $payment['phoneNumber'] = $bookingDetails[0]['phone'];
        $payment['email'] = $bookingDetails[0]['email'];
        $payment['paymentMode'] = '';
        $payment['issuerCode'] = '';
        $payment['cardHolderName'] = '';
        $payment['cardNumber'] = '';
        $payment['expiryMonth'] = '';
        $payment['cardType'] = '';
        $payment['cvvNumber'] = '';
        $payment['expiryYear'] = '';
        $payment['returnUrl'] = URL::route('booking-success');
        $payment['notifyUrl'] = '';

        return View::make('frontend.pages.payment', compact('bookingDetails', 'listing', 'days', 'payment'));
    }

    public function response() {
        $booking_data = Booking::leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                        ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                        ->leftJoin("listings", "listings.id", "=", "bookings.listing_id")
                        ->where("bookings.id", '=', Session::get('booking_id'))->get(["customers.*", "localities.locality", "bookings.*", "listings.*",])->toArray();

        $listings = Booking::where("id", '=', Session::get('booking_id'))->get()->first();

        $listings_data = Listing::Join("services", "services.id", "=", "listings.service_id")
                        ->Join("cities", "cities.id", "=", "listings.city_id")
                        ->Join("categories", "categories.id", "=", "listings.category_id")
                        ->where("listings.id", '=', $listings->listing_id)
                        ->get()->first()->toArray();



        $response_data = Input::all();
        if ($response_data['TxStatus'] == 'SUCCESS') {
            $bookingUpdate = Booking::find(Session::get('booking_id'));
            $bookingUpdate->mode = @$response_data['paymentMode'];
            $bookingUpdate->txn_ref_no = $response_data['TxRefNo'];
            $bookingUpdate->txn_status = $response_data['TxStatus'];
            $bookingUpdate->txn_msg = $response_data['TxMsg'];
            $bookingUpdate->update();
            $contactEmail = "bookings@carz247.com";
            $contactName = '';

            $email_id = $booking_data[0]['email'];
            $to_name = $booking_data[0]['fname'];
            $data = array('listings_data' => $listings_data, 'booking_data' => $booking_data, 'response_data' => $response_data);
            Mail::send('frontend.pages.success_mail', $data, function($message) use ($contactEmail, $contactName, $email_id, $to_name) {
                $message->from($contactEmail, $contactName);
                $message->to($email_id, $to_name)->subject('Invoice');
                $message->cc('parin@infiniteit.biz');
                $message->cc('gautam.udani@infiniteit.biz');
            });
            //sending sms 
            $phone = $booking_data[0]['phone'];
            $message = "We have received your booking with order no " . Session::get('booking_id') . ". To manage your order please call on 7666947247.";
            Helper::sendSMS($phone, $message);
            Helper::sendSMS('7666947247', $message);
        } else {

            $bookingUpdate = Booking::find(Session::get('booking_id'));
            $bookingUpdate->mode = $response_data['paymentMode'];
            $bookingUpdate->txn_ref_no = $response_data['TxRefNo'];
            $bookingUpdate->txn_status = $response_data['TxStatus'];
            $bookingUpdate->txn_msg = $response_data['TxMsg'];
            $bookingUpdate->update();
        }

        Session::forget('booking_id');
        return View::make('frontend.pages.booking-success', compact('response_data', 'booking_data', 'listings_data'));
    }

    public function save_booking() {
        $chk_user = Input::get('userId');
        if ($chk_user == 0) {
            $save = $this->insert_new_customer(Input::get('email'), Input::get('firstname'), Input::get('lastname'), Input::get('zipcode'), Input::get('phone'), Input::get('address'));
            if ($save) {
                $booking = $this->save_booking_details($save, Input::get('listing_id'), Input::get('locality'), Input::get('hour') . ":" . Input::get('mins'), Input::get('instructions'), Input::get('cost'));
                if (!Session::get('booking_id')) {
                    if ($booking) {
                        Session::put('booking_id', $booking);
                        return Redirect::route("payment");
                    }
                } else {
                    $update = $this->update_booking_details(Input::get('hour') . ":" . Input::get('mins'), Input::get('instructions'));
                    return Redirect::route("payment");
                }
            }
        } else {
            $update = $this->update_customer_details(Input::get('userId'), Input::get('email'), Input::get('firstname'), Input::get('lastname'), Input::get('phone'), Input::get('address'), Input::get('zipcode'));
            if ($update) {
                $booking = $this->save_booking_details(Input::get('userId'), Input::get('listing_id'), Input::get('locality'), Input::get('hour') . ":" . Input::get('mins'), Input::get('instructions'), Input::get('cost'));
                if (!Session::get('booking_id')) {
                    if ($booking) {
                        Session::put('booking_id', $booking);
                        return Redirect::route("payment");
                    }
                } else {
                    $update = $this->update_booking_details(Input::get('hour') . ":" . Input::get('mins'), Input::get('instructions'));
                    return Redirect::route("payment");
                }
            }
        }
    }

    public function booking_get_customer() {
        $email = Input::get('email');

        $customer = Customer::where("email", '=', $email)->get()->toArray();
        if (!empty($customer)) {
            $customer = json_encode($customer[0]);
        } else {
            $customer = "";
        }
        echo $customer;
    }

    public function insert_new_customer($email, $fname, $lname, $zipcode, $mobile, $address) {
        $customer = new Customer();
        $customer->email = $email;
        $customer->fname = $fname;
        $customer->lname = $lname;
        $customer->phone = $mobile;
        $customer->address = $address;
        $customer->zipcode = $zipcode;
        $save = $customer->save();

        if ($save) {
            return $customer->id;
        } else {
            return FALSE;
        }
    }

    public function update_customer_details($userid, $email, $fname, $lname, $phone, $address, $zipcode) {
        $customer = Customer::find($userid);
        $customer->email = $email;
        $customer->fname = $fname;
        $customer->lname = $lname;
        $customer->phone = $phone;
        $customer->address = $address;
        $customer->zipcode = $zipcode;
        $update = $customer->update();

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function save_booking_details($userid, $listing_id, $locality_id, $pickup_time, $instruction, $cost) {
        $booking = new Booking();
        $booking->customer_id = $userid;
        $booking->listing_id = $listing_id;
        $booking->locality_id = $locality_id;
        $booking->pickup_time = $pickup_time;
        $booking->instructions = $instruction;
        $booking->from_city = Session::get('from_city');
        $booking->to_city = Session::get('toCity') ? Session::get('toCity') : Session::get('from_city');
        $booking->upload = json_encode([]);
        $booking->start_date = date("Y-m-d H:i:s", strtotime(Session::get('fromDate')));
        $booking->end_date = Session::get('toDate') ? date("Y-m-d H:i:s", strtotime(Session::get('toDate'))) : date("Y-m-d H:i:s", strtotime(Session::get('fromDate')));
        $booking->cost = $cost;
        $save = $booking->save();

        if ($save) {
            return $booking->id;
        } else {
            return FALSE;
        }
    }

    public function update_booking_details($pickup_time, $instructions) {
        $booking = Booking::find(Session::get('booking_id'));
        $booking->pickup_time = $pickup_time;
        $booking->instructions = $instructions;
        $update = $booking->update();

        if ($update) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
