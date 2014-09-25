<?php

class PagesController extends BaseController {

    public function home() {

        $categories = Category::leftJoin("listings", "listings.category_id", "=", "categories.id")->where("listings.city_id", "=", 815)->where("listings.service_id", "=", 1)->where("listings.package_id", "=", 1)->get(["categories.*", "listings.extra_km_cost"]);

        /* Cities/packages for Local Listings */

        Session::forget('toDate');
        Session::forget('fromDate');
        Session::forget('city_id');
        Session::forget('booking_id');

        $localCities = City::Join("listings", "cities.id", "=", "listings.city_id")
                ->where('cities.status', '=', 1)
                ->where('listings.service_id', '=', 1)
                ->groupBy('cities.id')
                ->get(['cities.*']);

        $localPackages = Package::Join("listings", "packages.id", "=", "listings.package_id")
                ->where('packages.status', '=', 1)
                ->where('listings.service_id', '=', 1)
                ->groupBy('packages.id')
                ->get(['packages.*']);

        /* Cities for Outstation Listings */

        $outstationCities = City::Join("listings", "cities.id", "=", "listings.city_id")
                ->where('cities.status', '=', 1)
                ->where('listings.service_id', '=', 2)
                ->groupBy('cities.id')
                ->get(['cities.*']);


        /* Cities for Airport Listings */

        $airportCities = City::Join("listings", "cities.id", "=", "listings.city_id")
                ->where('cities.status', '=', 1)
                ->where('listings.service_id', '=', 2)
                ->groupBy('cities.id')
                ->get(['cities.*']);


        $get_cities = City::select('city')->orderBy('city', 'asc')->get()->toArray();

        $allCities = [];

        foreach ($get_cities as $value) {
            array_push($allCities, $value["city"]);
        }

        $allCities = json_encode($allCities);

        return View::make('frontend.pages.home', compact('categories', 'localCities', 'outstationCities', 'localPackages', 'airportCities', 'allCities'));
    }
    
    public function home2(){
        $categories = Category::leftJoin("listings", "listings.category_id", "=", "categories.id")->where("listings.city_id", "=", 815)->where("listings.service_id", "=", 1)->where("listings.package_id", "=", 1)->get(["categories.*", "listings.extra_km_cost"]);

        /* Cities/packages for Local Listings */

        Session::forget('toDate');
        Session::forget('fromDate');
        Session::forget('city_id');
        Session::forget('booking_id');

        $localCities = City::Join("listings", "cities.id", "=", "listings.city_id")
                ->where('cities.status', '=', 1)
                ->where('listings.service_id', '=', 1)
                ->groupBy('cities.id')
                ->get(['cities.*']);

        $localPackages = Package::Join("listings", "packages.id", "=", "listings.package_id")
                ->where('packages.status', '=', 1)
                ->where('listings.service_id', '=', 1)
                ->groupBy('packages.id')
                ->get(['packages.*']);

        /* Cities for Outstation Listings */

        $outstationCities = City::Join("listings", "cities.id", "=", "listings.city_id")
                ->where('cities.status', '=', 1)
                ->where('listings.service_id', '=', 2)
                ->groupBy('cities.id')
                ->get(['cities.*']);


        /* Cities for Airport Listings */

        $airportCities = City::Join("listings", "cities.id", "=", "listings.city_id")
                ->where('cities.status', '=', 1)
                ->where('listings.service_id', '=', 2)
                ->groupBy('cities.id')
                ->get(['cities.*']);


        $get_cities = City::select('city')->orderBy('city', 'asc')->get()->toArray();

        $allCities = [];

        foreach ($get_cities as $value) {
            array_push($allCities, $value["city"]);
        }

        $allCities = json_encode($allCities);

        return View::make('frontend.pages.home2', compact('categories', 'localCities', 'outstationCities', 'localPackages', 'airportCities', 'allCities'));  
        
        
    }

    public function local() {

        Session::put('fromDate', Input::get("fromDate"));
        Session::put('toDate', Input::get("toDate"));
        Session::put('city_id', Input::get("city_id"));

        $listings = Listing::where('city_id', '=', Input::get("city_id"))
                        ->where('package_id', '=', Input::get("package_id"))
                        ->where('service_id', '=', Input::get("service_id"))
                        ->join("services", "services.id", "=", "listings.service_id")
                        ->join("cities", "cities.id", "=", "listings.city_id")
                        ->join("packages", "packages.id", "=", "listings.package_id")
                        ->join("categories", "categories.id", "=", "listings.category_id")->get(['listings.*', 'cities.city', 'services.service', 'packages.package', 'categories.category', 'categories.image', 'categories.cars', 'categories.seats'])->toArray();

        return View::make('frontend.pages.listing', compact('listings'));
    }

    public function airport() {

        Session::put('fromDate', Input::get("fromDate"));
        Session::put('toDate', Input::get("toDate"));
        Session::put('city_id', Input::get("city_id"));

        $listings = Listing::where('city_id', '=', Input::get("city_id"))
                        ->where('service_id', '=', Input::get("service_id"))
                        ->join("services", "services.id", "=", "listings.service_id")
                        ->join("cities", "cities.id", "=", "listings.city_id")
                        ->join("categories", "categories.id", "=", "listings.category_id")->get(['listings.*', 'cities.city', 'services.service', 'categories.category', 'categories.image', 'categories.cars', 'categories.seats'])->toArray();

        return View::make('frontend.pages.listing', compact('listings'));
    }

    public function outstation() {

        Session::put('fromDate', Input::get("fromDate"));
        Session::put('toDate', Input::get("toDate"));
        Session::put('city_id', Input::get("city_id"));
        Session::put('toCity', Input::get("toCity"));

        $fromDate = new DateTime(Input::get("fromDate"));
        $toDate = new DateTime(Input::get("toDate"));

        $days = $toDate->diff($fromDate)->format("%a") + 1;

        $listings = Listing::where('city_id', '=', Input::get("city_id"))
                        ->where('service_id', '=', Input::get("service_id"))
                        ->join("services", "services.id", "=", "listings.service_id")
                        ->join("cities", "cities.id", "=", "listings.city_id")
                        ->join("categories", "categories.id", "=", "listings.category_id")->orderBy('categories.id', 'ASC')->get(['listings.*', 'cities.city', 'services.service', 'categories.category', 'categories.image', 'categories.cars', 'categories.seats'])->toArray();

        return View::make('frontend.pages.outstation', compact('listings', 'days'));
    }

    public function partner_with_us() {
        return View::make('frontend.pages.partner_with_us');
    }

    public function save_partner() {
        $partner = new Partner();
        $partner->company_name = Input::get('company_name');
        $partner->contact_person = Input::get('contact_person');
        $partner->mobile_number = Input::get('mobile');
        $partner->email = Input::get('email');
        $partner->address = Input::get('address');
        $partner->save();
        return Redirect::route('thank-you');
    }

    public function contact() {
        return View::make('frontend.pages.contact');
    }

    public function save_contact() {
        $contact = new Contact();
        $contact->name = Input::get('name');
        $contact->email = Input::get('email');
        $contact->mobile = Input::get('mobile');
        $contact->message = Input::get('message');
        $contact->save();
        return Redirect::route('thank-you');
    }

    public function save_career() {
        $career = new Career();
        $career->name = Input::get('contact_person');
        $career->email = Input::get('email');
        $career->mobile = Input::get('mobile');

        $destinationPath = public_path() . '/frontend/resume-uploads/';
        $fileName = date("YmdHis") . "." . Input::file('resume')->getClientOriginalExtension();

        if (Input::hasFile('resume')) {
            $upload_success = Input::file('resume')->move($destinationPath, $fileName);
            if ($upload_success) {
                $career->resume = $fileName;
            } else {
                
            }
        }

        $career->remarks = Input::get('remarks');
        $career->save();

        return Redirect::route('thank-you');
    }

    public function careers() {
        return View::make('frontend.pages.careers');
    }

    public function register() {
        $cities = City::orderBy('city', 'asc')->get();
        return View::make('frontend.pages.register', compact('cities'));
    }

    public function save_register() {
        if (Input::get('password') === Input::get('confirm_password')) {
            $register = new Customer();
            $register->fname = Input::get('fname');
            $register->lname = Input::get('lname');
            $register->email = Input::get('email');
            $register->phone = Input::get('mobile');
            $register->password = Hash::make(Input::get('password'));
            $register->zipcode = Input::get('zipcode');
            $register->address = Input::get('address');
            $register->city_id = Input::get('city');
            $register->save();
            return Redirect::route('register')->withErrors(['Successfully registered with carz247.']);
        } else {
            return Redirect::route('register')->withErrors(['Error being registered.']);
        }
    }

    public function login() {
        return View::make('frontend.pages.login');
    }

    public function check_login() {
        $userdata = array(
            'email' => Input::get('email'),
            'password' => Input::get('password')
        );
        $email = Input::get('email');
        $user_name = Customer::where('email', "=", $email)->get()->first();
        //$user_name = DB::table('customers')->where('email', $email)->first();
        //dd($user_name->id);
        if (Auth::attempt($userdata)) {
            $data = Session::all();
            Session::put('email', Input::get("email"));
            Session::put('customer_id', $user_name->id);

            Session::put('fname', $user_name->fname);
            Session::put('lname', $user_name->lname);
            Session::put('address', $user_name->address);
           
            Session::put('zipcode', $user_name->zipcode);
            Session::put('phone', $user_name->phone);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login')->withErrors(['Error being login']);
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }

    public function edit_profile() {
        $cities = City::all();
        $customers = Customer::where('id', "=", Session::get('customer_id'))->get()->first();
        return View::make('frontend.pages.edit_profile', compact('cities', 'customers'));
    }

    public function update_edit_profile() {
        $customer = Customer::find(Input::get("customerid"));
        $customer->email = Input::get("email");
        $customer->fname = Input::get("fname");
        $customer->lname = Input::get("lname");
        $customer->phone = Input::get("phone");
        $customer->address = Input::get("address");
        $customer->city_id = Input::get("city");
        $customer->zipcode = Input::get("zipcode");
        $update = $customer->update();
        return Redirect::to('/');
    }

    public function change_password() {
        return View::make('frontend.pages.change_password');
    }

    public function check_change_password() {
        $customer = Customer::where('email', "=", (Session::get('email')))->get()->first();
        $check = (Hash::check(Input::get('currentPassword'), $customer->password));
        if ($check == true) {
            if (Input::get('newPassword') === Input::get('NewConfirmPassword')) {
                $customer = Customer::find(Session::get('customer_id'));
                $customer->password = Hash::make(Input::get("newPassword"));
                $customer->update();
                return Redirect::to('/');
            }
        } else {
            return Redirect::to('/change_password');
        }
    }

    public function forgot_password() {

        return View::make('frontend.pages.forgot_password');
    }

    public function check_forgot_password() {

        $email = Customer::where('email', '=', Input::get('email'))->get()->first();

        if (!empty($email->email)) {

            $email_id = $email->email;
            $to_name = $email->fname . " " . $email->lname;
            $encoded_url = urlencode(base64_encode($email_id));
            $contactEmail = "info@carz247.com";
            $contactName = '';
            //$data = array();
            $data = array('encode_url' => "http://carz247.boxcommerce.in/reset-password/" . $encoded_url);
            Mail::send('frontend.pages.email', $data, function($message) use ($contactEmail, $contactName, $email_id, $to_name) {
                $message->from($contactEmail, $contactName);
                $message->to($email_id, $to_name)->subject('CARZ checking');
            });

            return Redirect::to('/forgot_password')->withErrors(['A Link to reset your password has been sent. Please check your email.']);
        } else {
            return Redirect::to('/forgot_password')->withErrors(['Email is not registered with us.']);
        }
    }

    public function reset_password($email) {
        $email = base64_decode(urldecode($email));
        return View::make('frontend.pages.reset_password', compact('email'));
    }

    public function check_reset_password() {
        $chk_email = Customer::where('email', '=', Input::get('email'))->get()->first();
        if (!empty($chk_email->email)) {
            if (Input::get('newPassword') === Input::get('newConfirmPassword')) {
                $customer = Customer::find($chk_email->id);
                $customer->password = Hash::make(Input::get("newPassword"));
                $customer->update();
                return Redirect::to('/forgot_password')->withErrors(['Password has been reset successfully.']);
            } else {
                return Redirect::to('/forgot_password')->withErrors(['Error being reset password']);
            }
        }
    }

}
