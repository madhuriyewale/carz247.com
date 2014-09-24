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
        $users = Customer::all();
        return View::make('admin.pages.users', compact('users'));
    }

    public function save_user() {

        $saveUser = new Customer();
        $saveUser->fname = Input::get('fname');
        $saveUser->lname = Input::get('lname');
        $saveUser->address = Input::get('address');
        $saveUser->phone = Input::get('phone');
        $saveUser->zipcode = Input::get('zipcode');
        $saveUser->email = Input::get('email');
        $saveUser->save();
        return Redirect::route('users');
    }

    public function user_delete($id) {
        Customer::find($id)->delete();
        return Redirect::route('users');
    }

    public function user_edit() {
        $updateUser = Customer::find(Input::get("id"));
        $updateUser->fname = Input::get('fname');
        $updateUser->lname = Input::get('lname');
        $updateUser->address = Input::get('address');
        $updateUser->phone = Input::get('phone');
        $updateUser->zipcode = Input::get('zipcode');
        $updateUser->email = Input::get('email');
        $updateUser->update();
        return Redirect::route('users');
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
        $orders = Booking::leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                ->leftJoin("listings", "listings.id", "=", "bookings.listing_id")
                ->leftJoin("services", "services.id", "=", "listings.service_id")
                ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                ->leftJoin("categories", "categories.id", "=", "listings.category_id")
                ->leftJoin("venders", "venders.id", "=", "bookings.vender_id")
                ->get([ 'customers.fname', 'customers.lname', 'venders.venders_name', 'localities.locality', 'listings.*', 'services.service', 'cities.city', 'packages.package', 'categories.category', 'bookings.*']);

        $listings_data = Listing::all();


        $customers = Customer::all();
        $localities = Locality::all();
        $venders = Vender::all();
        $listings = Listing::leftJoin("services", "services.id", "=", "listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "listings.category_id")->get(['listings.*', 'cities.city', 'packages.package', 'services.service', 'categories.category']);
        return View::make('admin.pages.orders', compact('orders', 'customers', 'listings', 'localities', 'venders', 'listings_data'));
    }

    public function save_order() {

        $order = new Booking();

        $order->customer_id = Input::get('customer');
        $order->listing_id = Input::get('listing');
        $order->locality_id = Input::get('locality');
        $order->pickup_time = Input::get('pickuptime');
        $order->instructions = Input::get('instructions');
        $order->cost = Input::get('cost');
        $order->mode = Input::get('mode');

        $order->upload = json_encode(array());


        $order->txn_ref_no = Input::get('txn_ref_no');
        $order->txn_status = Input::get('txn_status');
        $order->txn_msg = Input::get('txn_msg');
        $order->booking_status = Input::get('booking_status');
        $order->vender_id = Input::get('vendersName');
        $order->drivers = Input::get('venderDrivers');
        $order->cars = Input::get('vendersCars');
        $order->save();
        return Redirect::route('orders');
    }

    public function order_delete($id) {
        Booking::find($id)->delete();
        return Redirect::route('orders');
    }

    public function order_edit() {
        $orderUpdate = Booking::find(Input::get("id"));
        $orderUpdate->customer_id = Input::get("customer");
        $orderUpdate->listing_id = Input::get("listing");
        $orderUpdate->locality_id = Input::get("locality");
        $orderUpdate->pickup_time = Input::get("pickuptime");
        $orderUpdate->instructions = Input::get('instructions');
        $orderUpdate->cost = Input::get("cost");
        $orderUpdate->mode = Input::get("mode");
        $orderUpdate->txn_ref_no = Input::get("txn_ref_no");
        $orderUpdate->txn_status = Input::get("txn_status");
        $orderUpdate->txn_msg = Input::get("txn_msg");
        $orderUpdate->booking_status = Input::get("booking_status");
        $orderUpdate->vender_id = Input::get("vendersName");
        $orderUpdate->drivers = Input::get("venderDrivers");
        $orderUpdate->cars = Input::get("vendersCars");
        $orderUpdate->start_date = Input::get("startDate");
        $orderUpdate->end_date = Input::get("endDate");
        $orderUpdate->start_km = Input::get("startKm");
        $orderUpdate->end_km = Input::get("endKm");
        $orderUpdate->discount = Input::get("discount");
        $orderUpdate->remark = Input::get("remark");
        $orderUpdate->extras = Input::get("extras");

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

        $orderUpdate->upload = json_encode($orderDocs);
        $orderUpdate->update();
        return Redirect::route('orders');
    }

    public function contact_enquiries() {
        $contacts = Contact::all();
        return View::make('admin.pages.contact_enquiries', compact('contacts'));
    }

    public function partners_with_us() {
        $partners = Partner::all();
        return View::make('admin.pages.partners_with_us', compact('partners'));
    }

    public function career_requests() {
        $careers = Career::all();
        return View::make('admin.pages.career_requests', compact('careers'));
    }

    public function login() {
        
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

    public function invoice($id) {

        $bookingData = Booking::leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                        ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                        ->leftJoin("listings", "listings.id", "=", "bookings.listing_id")
                        ->leftJoin("services", "services.id", "=", "listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "listings.category_id")
                        ->leftJoin("venders", "venders.id", "=", "bookings.vender_id")
                        ->where("bookings.id", "=", $id)
                        ->get([ 'customers.fname', 'customers.lname', 'venders.venders_name', 'localities.locality', 'listings.*', 'services.service', 'cities.city', 'packages.package', 'categories.category', 'bookings.*'])->toArray();

        $fromDate = new DateTime($bookingData[0]["start_date"]);
        $endDate = new DateTime($bookingData[0]["end_date"]);
        $interval = $fromDate->diff($endDate);

        $kms = $bookingData[0]["end_km"] - $bookingData[0]["start_km"];
        $discount = $bookingData[0]["discount"];
        $st = $bookingData[0]["service_tax"];
        $prepaid = $bookingData[0]["cost"];
        $extra = $bookingData[0]["extras"];
        if (preg_match("/local/i", $bookingData[0]["service"]) || preg_match("/airport/i", $bookingData[0]["service"])) {

            $hours = $interval->h;
            $hours = $hours + ($interval->days * 24);

            $kmsTravelled = $kms - $bookingData[0]["min_kms"];
            $hrsTravelled = $hours - $bookingData[0]["min_hrs"];
            $amount = $bookingData[0]["base_cost"] + ( $kmsTravelled <= 0 ? : $kmsTravelled * $bookingData[0]["extra_km_cost"]) + ($hrsTravelled <= 0 ? : $hrsTravelled * $bookingData[0]["extra_hr_cost"]);

            $recieptCnt = "<p>1</p><p>2</p><p>3</p>";
            $recieptCont = "<p>" . ucwords($bookingData[0]['category']) . " Car Category</p>
                            <p>Extra km above " . $bookingData[0]["min_kms"] . " @ Rs." . $bookingData[0]["extra_km_cost"] . "/-km </p>
                            <p>Extra hrs above " . $bookingData[0]["min_hrs"] . " hrs @ Rs." . $bookingData[0]["extra_hr_cost"] . "/-hrs";

            $finalAmnt = ($amount + $extra - $discount);
            $finalAmnt = $finalAmnt + ($finalAmnt * ($st / 100)) - $prepaid;
        } else {

            $days = $interval->days + 1;
            $kmsTravelled = $kms - $bookingData[0]["min_kms"] * $days;
            $amount = ($kmsTravelled <= 0 ? $bookingData[0]["min_kms"] * $days : $kms ) * $bookingData[0]["extra_km_cost"] + $days * $bookingData[0]["driver_cost"];

            $recieptCnt = "<p>1</p><p>2</p><p>3</p>";
            $recieptCont = "<p>" . ucwords($bookingData[0]['category']) . " Car Category</p>
                            <p>Extra km above " . $bookingData[0]["min_kms"] * $days . " @ Rs." . $bookingData[0]["extra_km_cost"] . "/-km </p>
                            <p>Driver Allowance " . $bookingData[0]["driver_cost"] . "/-Day";

            $finalAmnt = ($amount + $extra - $discount);
            $finalAmnt = $finalAmnt + ($finalAmnt * ($st / 100)) - $prepaid;

            $hours = $days;
        }
        return View::make('admin.pages.invoice', compact('bookingData', 'recieptCnt', 'recieptCont', 'kms', 'hours', 'amount', 'discount', 'extra', 'st', 'prepaid', 'finalAmnt'));
    }

}
