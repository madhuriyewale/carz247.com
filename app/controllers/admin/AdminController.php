<?php

class AdminController extends BaseController {

    public function cities() {

        $cities = City::all();
        return View::make('admin.pages.cities', compact('cities'));
    }

    public function save_cities() {
        $cities = new City();
        $cities->city = Input::get('city');
        $cities->status = Input::get('status');
        $cities->save();
        return Redirect::route('cities');
    }

    public function cities_edit() {
        $cities = City::find(Input::get("id"));
        $cities->city = Input::get("city");
        $cities->status = Input::get("status");
        $cities->update();
        return Redirect::route('cities');
    }

    public function localities() {
        $localities = Locality::all();
        $cities = City::all();
        return View::make('admin.pages.localities', compact('localities', 'cities'));
    }

    public function save_locality() {
        $localities = new Locality();
        $localities->city_id = Input::get("city");
        $localities->locality = Input::get("locality");
        $localities->save();
        return Redirect::route('localities');
    }

    public function locality_edit() {
        $localityUpdate = Locality::find(Input::get("id"));
        $localityUpdate->city_id = Input::get("city");
        $localityUpdate->locality = Input::get("locality");

        $localityUpdate->update();
        return Redirect::route('localities');
    }

    public function locality_dropdown($id) {
        $listing_id = Listing::where("id", "=", $id)->get(['city_id'])->toArray();

        $localities = Locality::where("city_id", "=", $listing_id[0]['city_id'])->get(['id', 'locality'])->toArray();

        echo "<option value=''>Please Select</option>";
        foreach ($localities as $locality) {
            echo "<option value='$locality[id]'>" . $locality['locality'] . "</option>";
        }
    }

    public function locality_delete($id) {
        Locality::find($id)->delete();
        return Redirect::route('localities');
    }

    public function services() {

        $services = Service::all();
        return View::make('admin.pages.services', compact('services'));
    }

    public function packages() {

        $packages = Package::all();
        return View::make('admin.pages.packages', compact('packages'));
    }

    public function categories() {

        $categories = Category::all();
        return View::make('admin.pages.categories', compact('categories'));
    }

    public function save_package() {
        $package = new Package();
        $package->package = Input::get('package');
        $package->status = Input::get('status');
        $package->save();
        return Redirect::route('packages');
    }

    public function save_service() {
        $service = new Service();
        $service->service = Input::get('service');
        $service->status = Input::get('status');
        $service->save();
        return Redirect::route('services');
    }

    public function save_category() {

        $categories = new Category();
        $categories->category = Input::get('category');
        $categories->cars = json_encode(explode(",", Input::get('cars')));
        $categories->seats = Input::get('seats');
        $destinationPath = public_path() . '/frontend/images/car-uploads/';
        $fileName = date("YmdHis") . "." . Input::file('image')->getClientOriginalExtension();

        if (Input::hasFile('image')) {
            $upload_success = Input::file('image')->move($destinationPath, $fileName);
            if ($upload_success) {
                $categories->image = $fileName;
            } else {
                
            }
        }

        $categories->save();
        return Redirect::route('categories');
    }

    public function package_delete($id) {
        Package::find($id)->delete();
        return Redirect::route('packages');
    }

    public function package_edit() {
        $package = Package::find(Input::get("id"));
        $package->package = Input::get("package");
        $package->status = Input::get("status");
        $package->update();
        return Redirect::route('packages');
    }

    public function service_delete($id) {
        Service::find($id)->delete();
        return Redirect::route('services');
    }

    public function service_edit() {
        $service = Service::find(Input::get("id"));
        $service->service = Input::get("service");
        $service->status = Input::get("status");
        $service->update();
        return Redirect::route('services');
    }

    public function carz_listing() {

        $listings = Listing::leftJoin("services", "services.id", "=", "listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "listings.category_id")->get(['listings.*', 'cities.city', 'packages.package', 'services.service', 'categories.category']);

        $services = Service::where('status', '=', 1)->get();
        $cities = City::where('status', '=', 1)->get();

        $categories = Category::all();
        $packages = Package::where('status', '=', 1)->get();


        return View::make('admin.pages.carz_listing', compact('services', 'cities', 'categories', 'packages', 'listings'));
    }

    public function save_listing() {
        $listing = new Listing();
        $listing->city_id = Input::get('city');
        $listing->service_id = Input::get('service');
        $listing->category_id = Input::get('category');
        $listing->package_id = Input::get('package');

        $listing->min_kms = Input::get('min_kms');
        $listing->min_hrs = Input::get('min_hrs');

        $listing->base_cost = Input::get('base_cost');
        $listing->driver_cost = Input::get('driver_cost');
        $listing->extra_km_cost = Input::get('extra_km_cost');
        $listing->extra_hr_cost = Input::get('extra_hr_cost');

        $listing->save();

        return Redirect::route('carz_listing');
    }

    public function city_delete($id) {
        City::find($id)->delete();
        return Redirect::route('cities');
    }

    public function category_edit() {
        $categories = Category::find(Input::get("id"));
        $categories->category = Input::get('category');
        $categories->cars = json_encode(explode(",", Input::get('cars')));
        $categories->seats = Input::get('seats');

        if (Input::hasFile('image')) {
            $destinationPath = public_path() . '/frontend/images/car-uploads/';
            $fileName = date("YmdHis") . "." . Input::file('image')->getClientOriginalExtension();
            $upload_success = Input::file('image')->move($destinationPath, $fileName);
            if ($upload_success) {
                $categories->image = $fileName;
            }
        }

        $categories->update();
        return Redirect::route('categories');
    }

    public function category_delete($id) {
        Category::find($id)->delete();
        return Redirect::route('categories');
    }

    public function users() {
        $fromOrder = isset($_GET["add"]) ? 1 : 0;
        $users = Customer::leftJoin("cities", "cities.id", "=", "customers.city_id")
                ->where("email", "!=", "admin@carz247.com")
                ->get(['customers.*', 'cities.city']);
        $cities = City::all();
        return View::make('admin.pages.users', compact('users', 'cities', 'fromOrder'));
    }

    public function save_user() {

        $saveUser = new Customer();
        $saveUser->fname = Input::get('fname');
        $saveUser->lname = Input::get('lname');
        $saveUser->address = Input::get('address');
        $saveUser->phone = Input::get('phone');
        $saveUser->city_id = Input::get('city');
        $saveUser->zipcode = Input::get('zipcode');
        $saveUser->email = Input::get('email');
        $saveUser->save();

        if (Input::get('fromOrder') == 0) {
            return Redirect::route('users');
        } else {
            return Redirect::route('orders');
        }
    }

    public function user_delete($id) {
        Customer::find($id)->delete();
        return Redirect::route('users');
    }

    public function user_edit() {

        $updateUser = Customer::find(Input::get('id'));
        $updateUser->fname = Input::get('fname');
        $updateUser->lname = Input::get('lname');
        $updateUser->address = Input::get('address');
        $updateUser->phone = Input::get('phone');
        $updateUser->city_id = Input::get('city');
        $updateUser->zipcode = Input::get('zipcode');
        $updateUser->email = Input::get('email');
        $updateUser->update();
        return Redirect::route('users');
    }

    public function testimonials() {
        $testimonials = Testimonial::all();

        return View::make('admin.pages.testimonial', compact('testimonials'));
    }

    public function save_testimonial() {
        $testimonial = new Testimonial();
        $testimonial->testimonial = Input::get('testimonial');
        $testimonial->from = Input::get('from');
        $testimonial->save();
        return Redirect::route('testimonials');
    }

    public function testimonial_delete($id) {
        Testimonial::find($id)->delete();
        return Redirect::route('testimonials');
    }

    public function testimonial_edit() {

        $testimonialUpdate = Testimonial::find(Input::get('id'));
        $testimonialUpdate->testimonial = Input::get('testimonial');
        $testimonialUpdate->from = Input::get('from');
        $testimonialUpdate->update();
        return Redirect::route('testimonials');
    }

    public function listing_edit() {

        $listing = Listing::find(Input::get("id"));
        $listing->service_id = Input::get("service");
        $listing->package_id = Input::get("package");
        $listing->city_id = Input::get("city");
        $listing->category_id = Input::get("category");
        $listing->min_kms = Input::get("min_kms");
        $listing->min_hrs = Input::get("min_hrs");
        $listing->base_cost = Input::get("base_cost");
        $listing->driver_cost = Input::get("driver_cost");
        $listing->extra_km_cost = Input::get("extra_km_cost");
        $listing->extra_hr_cost = Input::get("extra_hr_cost");
        $listing->update();
        return Redirect::route('carz_listing');
    }

    public function listing_delete($id) {
        Listing::find($id)->delete();
        return Redirect::route('carz_listing');
    }

    public function orders() {
        $orders = Booking::orderBy("bookings.created", "desc")
                ->leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                ->leftJoin("listings", "listings.id", "=", "bookings.listing_id")
                ->leftJoin("services", "services.id", "=", "listings.service_id")
                ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                ->leftJoin("categories", "categories.id", "=", "listings.category_id")
                ->leftJoin("venders", "venders.id", "=", "bookings.vender_id")
                ->get([ 'customers.fname', 'customers.lname', 'venders.venders_name', 'localities.locality', 'listings.*', 'services.service', 'cities.city', 'packages.package', 'categories.category', 'bookings.*']);

        $listings_data = Listing::all();

        $vender_listing_data = VenderListing::leftJoin("cities", "cities.id", "=", "vender_listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "vender_listings.package_id")
                ->leftJoin("categories", "categories.id", "=", "vender_listings.category_id")
                ->leftJoin("services", "services.id", "=", "vender_listings.service_id")
                ->leftJoin("venders", "venders.id", "=", "vender_listings.vender_id")
                ->get(['vender_listings.*', 'packages.package', 'categories.category', 'cities.city', 'services.service', 'venders.venders_name']);




        $customers = Customer::all();
        $localities = Locality::orderBy('locality', 'asc')->get();
        $venders = Vender::all();
        $listings = Listing::leftJoin("services", "services.id", "=", "listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "listings.category_id")->get(['listings.*', 'cities.city', 'packages.package', 'services.service', 'categories.category']);
        return View::make('admin.pages.orders', compact('orders', 'customers', 'listings', 'localities', 'venders', 'listings_data', 'vender_listing_data'));
    }

    public function save_order() {

        $getOrderId = DB::table('bookings')->max('order_no');
        $nextOrderId = $getOrderId + 1;

        $getInvoiceId = DB::table('bookings')->max('invoice_no');
        $nextInvoiceId = $getInvoiceId + 1;

        $order = new Booking();

        $order->customer_id = Input::get('customer');
        $order->listing_id = Input::get('listing');
        $order->locality_id = Input::get('locality');
        $order->pickup_time = Input::get('pickuptime');
        $order->instructions = Input::get('instructions');
        $order->cost = Input::get('cost');
        $order->mode = Input::get('mode');
        $order->order_no = $nextOrderId;
        $order->upload = json_encode(array());

        $order->start_date = Input::get("startDate")[0];
        $order->end_date = Input::get("endDate")[0];

       // dd(Input::get("startKm"));

        Input::get('booking_status') == 3 ? ($order->invoice_no = $nextInvoiceId ) : '';

      //  $get_service = Listing::where("listings.id", "=", Input::get('listing'))->get()->first();
//
//        if ($get_service->service_id == "1") {
//            $chkCOUNT = "0";
//        } else {
//            $chkCOUNT = "1";
//        }


        $readings = [];
        $startKMS = Input::get("startKm");
        array_filter($startKMS);

        $endKMS = Input::get("endKm");
        array_filter($endKMS);

        $start_DATE = Input::get("startDate");
        array_filter($start_DATE);

        $end_DATE = Input::get("endDate");
        array_filter($end_DATE);

        count(Input::get("startKm")) > 1 ? : $order->start_km = Input::get("startKm")[0];
        count(Input::get("endKm")) > 1 ? : $order->end_km = Input::get("endKm")[0];
        count(Input::get("startDate")) > 1 ? : $order->start_date = Input::get("startDate")[0];
        count(Input::get("endDate")) > 1 ? : $order->end_date = Input::get("endDate")[0];

        array_push($readings, ["StartKm" => $startKMS]);
        array_push($readings, ["EndKm" => $endKMS]);
        array_push($readings, ["start_DATE" => $start_DATE]);
        array_push($readings, ["end_DATE" => $end_DATE]);

        $readings_data = json_encode($readings);
        $order->readings = $readings_data;

        $order->txn_ref_no = Input::get('txn_ref_no');
        $order->txn_status = Input::get('txn_status');
        $order->txn_msg = Input::get('txn_msg');
        $order->booking_status = Input::get('booking_status');
        $order->vender_id = Input::get('vendersName');
        $order->vender_listing_id = Input::get('venderListing');

        $order->drivers = Input::get('venderDrivers');
        $order->cars = Input::get('vendersCars');
        $order->extras = Input::get("extraHrs")[0];
        $order->toll = Input::get('toll');
        $order->permit = Input::get('permit');
        $order->parking = Input::get('parking');


        $order->discount = Input::get("discount");
        $order->remark = Input::get("remark");

        $order->service_tax = Input::get("serviceTax");
        $orderDocs = $order->upload == "" ? array() : json_decode($order->upload, true);
        $destinationPath = public_path() . '/admin/uploads/order-uploads/';
        if (Input::hasFile('uploadFile')) {
            $i = 1;
            foreach (Input::file("uploadFile") as $file) {
                $fileName = date("YmdHis") . "-$i" . "." . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $fileName);
                if ($upload_success) {
                    array_push($orderDocs, $fileName);
                    $i++;
                } else {
                    
                }
            }
        }

        $order->upload = json_encode($orderDocs);

        $order->save();
        return Redirect::route('orders');
    }

    public function order_delete($id) {
        Booking::find($id)->delete();
        return Redirect::route('orders');
    }

    public function order_edit() {


        $getInvoiceId = DB::table('bookings')->max('invoice_no');
        $nextInvoiceId = $getInvoiceId + 1;

        $orderUpdate = Booking::find(Input::get("id"));
        $orderUpdate->customer_id = Input::get("customer");
        $orderUpdate->listing_id = Input::get("listing");
        $orderUpdate->locality_id = Input::get("locality");
        $orderUpdate->pickup_time = Input::get('pickuptime');
        $orderUpdate->instructions = Input::get('instructions');
        $orderUpdate->cost = Input::get("cost");
        $orderUpdate->mode = Input::get("mode");
        $orderUpdate->txn_ref_no = Input::get("txn_ref_no");
        $orderUpdate->txn_status = Input::get("txn_status");
        $orderUpdate->txn_msg = Input::get("txn_msg");
        $orderUpdate->booking_status = Input::get("booking_status");
        $orderUpdate->vender_id = Input::get("vendersName");
        $orderUpdate->vender_listing_id = Input::get('venderListing');


        $orderUpdate->drivers = Input::get("venderDrivers");
        $orderUpdate->cars = Input::get("vendersCars");
        $orderUpdate->extras = Input::get("extraHrs")[0];
        $orderUpdate->toll = Input::get('toll');
        $orderUpdate->permit = Input::get('permit');
        $orderUpdate->parking = Input::get('parking');
      //  $get_service = Listing::where("listings.id", "=", Input::get('listing'))->get()->first();


//        if ($get_service->service_id == "1") {
//            $chkCOUNT = "0";
//        } else {
//            $chkCOUNT = "1";
//        }



        $readings = [];
        $startKMS = Input::get("startKm");
        array_filter($startKMS);

        $endKMS = Input::get("endKm");
        array_filter($endKMS);

        $start_DATE = Input::get("startDate");
        array_filter($start_DATE);

        $end_DATE = Input::get("endDate");
        array_filter($end_DATE);

        count(Input::get("startKm")) > 1 ? : $orderUpdate->start_km = Input::get("startKm")[0];
        count(Input::get("endKm")) > 1 ? : $orderUpdate->end_km = Input::get("endKm")[0];
        count(Input::get("startDate")) > 1 ? : $orderUpdate->start_date = Input::get("startDate")[0];
        count(Input::get("endDate")) > 1 ? : $orderUpdate->end_date = Input::get("endDate")[0];

        array_push($readings, ["StartKm" => $startKMS]);
        array_push($readings, ["EndKm" => $endKMS]);
        array_push($readings, ["start_DATE" => $start_DATE]);
        array_push($readings, ["end_DATE" => $end_DATE]);

        $readings_data = json_encode($readings);

        $orderUpdate->readings = $readings_data;
        $orderUpdate->discount = Input::get("discount");
        $orderUpdate->remark = Input::get("remark");

        $orderUpdate->service_tax = Input::get("serviceTax");
        $orderDocs = $orderUpdate->upload == "" ? array() : json_decode($orderUpdate->upload, true);
        $destinationPath = public_path() . '/admin/uploads/order-uploads/';
        if (Input::hasFile('uploadFile')) {
            $i = 1;
            foreach (Input::file("uploadFile") as $file) {
                $fileName = date("YmdHis") . "-$i" . "." . $file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $fileName);
                if ($upload_success) {
                    array_push($orderDocs, $fileName);
                    $i++;
                } else {
                    
                }
            }
        }
        (Input::get('booking_status') == 3 && $orderUpdate->invoice_no == '') ? $orderUpdate->invoice_no = $nextInvoiceId : '';

        $orderUpdate->upload = json_encode($orderDocs);
        $orderUpdate->update();
        return Redirect::route('orders');
    }

    public function contact_enquiries() {

        Contact::where("read", "=", "0")->update(["read" => 1]);
        $contacts = Contact::all();
        return View::make('admin.pages.contact_enquiries', compact('contacts'));
    }

    public function partners_with_us() {
        Partner::where("read", "=", "0")->update(["read" => 1]);
        $partners = Partner::all();
        return View::make('admin.pages.partners_with_us', compact('partners'));
    }

    public function career_requests() {
        $careerUpdate = Career::where('read', '=', 0)->update(['read' => 1]);

        $careers = Career::all();

        return View::make('admin.pages.career_requests', compact('careers'));
    }

    public function admin_login_chk() {

        $userdata = array(
            'email' => "admin@carz247.com",
            'password' => Input::get('password')
        );
        $email = "admin@carz247.com";
        $user_name = Customer::where('email', "=", $email)->get()->first();
        //$user_name = DB::table('customers')->where('email', $email)->first();

        if (Auth::attempt($userdata)) {
            $data = Session::all();
            Session::put('admin_email', $email);
            Session::put('customer_id', $user_name->id);

            Session::put('admin_fname', $user_name->fname);
            Session::put('admin_lname', $user_name->lname);
            Session::put('address', $user_name->address);

            return Redirect::to('/admin/dashboard');
        } else {
            return Redirect::to('/admin')->withErrors(['Error being login']);
        }
    }

    public function admin_logout() {
        Auth::logout();
        Session::flush();
        return Redirect::to('/admin');
    }

    public function venders() {
        $venders = Vender::all();

        return View::make('admin.pages.venders', compact('venders'));
    }

    public function drivers_dropdown($input) {
        $drivers = Vender::where("id", "=", $input)->get(['drivers', 'cars'])->toArray();

        echo $drivers[0]['drivers'];
        echo "======";
        echo $drivers[0]['cars'];
    }

    public function vendor_listing_dropdown($input) {
        $venderlisting_option_data = VenderListing::where("vender_id", "=", $input)
                ->leftJoin("services", "services.id", "=", "vender_listings.service_id")
                ->leftJoin("cities", "cities.id", "=", "vender_listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "vender_listings.package_id")
                ->leftJoin("categories", "categories.id", "=", "vender_listings.category_id")
                ->leftJoin("venders", "venders.id", "=", "vender_listings.vender_id")
                ->get(['packages.package', 'cities.city', 'categories.category', 'services.service', 'venders.venders_name', 'vender_listings.id'])
                ->toArray();


        echo "<option value=''>Please Select</option>";
        foreach ($venderlisting_option_data as $venderListingoption) {
            echo "<option value='$venderListingoption[id]'>" . $venderListingoption['city'] . " " . $venderListingoption['service'] . " " . $venderListingoption['category'] . " " . $venderListingoption['package'] . "</option>";
        }
    }

    public function save_vender() {
        $venders = new Vender();
        $venders->venders_name = Input::get('vendersName');
        $venders->city = Input::get('cityName');
        $venders->address = Input::get('address');
        $venders->zone = Input::get('zone');
        $venders->mobile_no = json_encode(explode(',', Input::get('mobileNo')));
        $venders->tan_no = Input::get('tanNo');
        $venders->pan_no = Input::get('panNo');
        $venders->drivers = json_encode(explode(',', Input::get('drivers')));
        $venders->cars = json_encode(explode(',', Input::get('cars')));
        $venders->save();
        return Redirect::route('venders');
    }

    public function vender_delete($id) {
        Vender::find($id)->delete();
        return Redirect::route('venders');
    }

    public function vender_edit() {

        $venderUpdate = Vender::find(Input::get("id"));
        $venderUpdate->venders_name = Input::get("vendersName");
        $venderUpdate->city = Input::get("cityName");
        $venderUpdate->address = Input::get("address");
        $venderUpdate->zone = Input::get("zone");
        $venderUpdate->mobile_no = json_encode(explode(',', Input::get("mobileNo")));
        $venderUpdate->tan_no = Input::get("tanNo");
        $venderUpdate->pan_no = Input::get("panNo");
        $venderUpdate->drivers = json_encode(explode(',', Input::get("drivers")));
        $venderUpdate->cars = json_encode(explode(',', Input::get("cars")));
        $venderUpdate->update();
        return Redirect::route('venders');
    }

    public function vender_listings() {

        $vender_listings = VenderListing::leftJoin("services", "services.id", "=", "vender_listings.service_id")
                ->leftJoin("cities", "cities.id", "=", "vender_listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "vender_listings.package_id")
                ->leftJoin("categories", "categories.id", "=", "vender_listings.category_id")
                ->leftJoin("venders", "venders.id", "=", "vender_listings.vender_id")
                ->get(['vender_listings.*', 'packages.package', 'cities.city', 'categories.category', 'services.service', 'venders.venders_name']);
        $cities = City::where("status", "=", 1)->get();
        $venders = Vender::all();
        $services = Service::where("status", "=", 1)->get();
        $packages = Package::where("status", "=", 1)->get();
        $categories = Category::all();
        return View::make('admin.pages.vender_listing', compact('vender_listings', 'cities', 'services', 'categories', 'venders', 'packages'));
    }

    public function save_vender_listing() {
        $vender_listings = new VenderListing();
        $vender_listings->vender_id = Input::get('vender_name');
        $vender_listings->city_id = Input::get('city');
        $vender_listings->service_id = Input::get('service');
        $vender_listings->category_id = Input::get('category');
        $vender_listings->package_id = Input::get('package');
        $vender_listings->min_kms = Input::get('min_kms');
        $vender_listings->min_hrs = Input::get('min_hrs');
        $vender_listings->base_cost = Input::get('base_cost');
        $vender_listings->driver_cost = Input::get('driver_cost');
        $vender_listings->extra_km_cost = Input::get('extra_km_cost');
        $vender_listings->extra_hr_cost = Input::get('extra_hr_cost');
        $vender_listings->save();
        return Redirect::route('vender_listings');
    }

    public function vender_listing_edit() {
        $vender_listings_update = VenderListing::find(Input::get("id"));
        $vender_listings_update->vender_id = Input::get("vender_name");
        $vender_listings_update->service_id = Input::get("service");
        $vender_listings_update->package_id = Input::get("package");
        $vender_listings_update->city_id = Input::get("city");
        $vender_listings_update->category_id = Input::get("category");
        $vender_listings_update->min_kms = Input::get('min_kms');
        $vender_listings_update->min_hrs = Input::get('min_hrs');
        $vender_listings_update->base_cost = Input::get('base_cost');
        $vender_listings_update->driver_cost = Input::get('driver_cost');
        $vender_listings_update->extra_km_cost = Input::get('extra_km_cost');
        $vender_listings_update->extra_hr_cost = Input::get('extra_hr_cost');
        $vender_listings_update->update();
        return Redirect::route('vender_listings');
    }

    public function vender_listing_delete($id) {
        VenderListing::find($id)->delete();
        return Redirect::route('vender_listings');
    }

    public function sales() {
        return View::make('admin.pages.sales');
    }

    public function order_view($id) {
        $orders_view = Booking::where("bookings.id", "=", $id)
                ->leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                ->leftJoin("listings", "listings.id", "=", "bookings.listing_id")
                ->leftJoin("services", "services.id", "=", "listings.service_id")
                ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                ->leftJoin("categories", "categories.id", "=", "listings.category_id")
                ->leftJoin("venders", "venders.id", "=", "bookings.vender_id")
                ->get([ 'customers.fname', 'customers.lname', 'venders.venders_name', 'localities.locality', 'listings.*', 'services.service', 'cities.city', 'packages.package', 'categories.category', 'bookings.*']);


        $vender_listing_data = Booking::where("bookings.id", "=", $id)
                ->leftJoin("vender_listings", "vender_listings.id", "=", "bookings.vender_listing_id")
                ->leftJoin("services", "services.id", "=", "vender_listings.service_id")
                ->leftJoin("categories", "categories.id", "=", "vender_listings.category_id")
                ->leftJoin("cities", "cities.id", "=", "vender_listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "vender_listings.package_id")
                ->get(['vender_listings.id', 'categories.category', 'packages.package', 'cities.city', 'services.service']);

        // dd($vender_listing_data);
        return View::make('admin.pages.order_view', compact('orders_view', 'vender_listing_data'));
    }

}
