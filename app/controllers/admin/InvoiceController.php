<?php

class InvoiceController extends BaseController {

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

        $carz_listing_details_data = json_decode($bookingData[0]["carz_listing_details"], true);


//dd($carz_listing_details_data[0]);



        $discount = $bookingData[0]["discount"];

        $st = $bookingData[0]["service_tax"];

        $prepaid = $bookingData[0]["cost"];

        $extra = $bookingData[0]["extras"];

        $toll = $bookingData[0]["toll"];

        $permit = $bookingData[0]["permit"];

        $parking = $bookingData[0]["parking"];









        if (preg_match("/local/i", $bookingData[0]["service"])) {



            $readings = json_decode($bookingData[0]["readings"], true);
            
          


            $stCnt = count(array_filter($readings[0]['StartKm']));
             //   dd($readings);

            $amount = 0;

            $kmz = 0;

            $hrz = 0;

            for ($i = 0; $i < $stCnt; $i++) {

                $kms = $readings[1]["EndKm"][$i] - $readings[0]["StartKm"][$i];







                $kmsTravelled = $kms - $carz_listing_details_data[0];



                $kmz += $kmsTravelled > 0 ? $kmsTravelled : 0;



                $nfromDate = new DateTime($readings[2]["start_DATE"][$i]);

                $nendDate = new DateTime($readings[3]["end_DATE"][$i]);

                $ninterval = $nfromDate->diff($nendDate);



                $hrsTravelled = ($ninterval->h + ($ninterval->i > 0 ? 1 : 0)) - $carz_listing_details_data[1];



                $hrz += $hrsTravelled > 0 ? $hrsTravelled : 0;
            }





            $kms = $kmz;



            $hours = $interval->days + 1;







            $recieptCont = "<tr>

                                <td>Base Cost for " . ucwords(strtolower($bookingData[0]['service'])) . "  " . ucwords(strtolower($bookingData[0]['category'])) . " Car " . ucwords($bookingData[0]['package']) . " (" . date('d M y', strtotime($bookingData[0]['start_date'])) . " - " . date('d M y', strtotime($bookingData[0]['end_date'])) . ")</td>

                                <td class = 'cnt'>" . $hours * $carz_listing_details_data[0] . "</td>

                                <td class = 'cnt'>$hours Day/s</td>

                                <td>" . $bc = $hours * $carz_listing_details_data[2] . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra km above " . $carz_listing_details_data[0] . " kms /- Day @ Rs." . $carz_listing_details_data[3] . " / km </td>

                                <td class = 'cnt'>$kmz</td>

                                <td class = 'cnt'>-</td>

                                <td>" . $kc = $kmz * $carz_listing_details_data[3] . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra hrs above " . $carz_listing_details_data[2] . " hrs /- Day @ Rs." . $carz_listing_details_data[4] . " / hrs</td>

                                <td class = 'cnt'>-</td>

                                <td class = 'cnt'>$hrz Hour/s</td>

                                <td>" . $hc = $hrz * $carz_listing_details_data[4] . "</td>

                            </tr>";

            $amount = $bc + $kc + $hc;
        } elseif (preg_match("/airport/i", $bookingData[0]["service"])) {



            $hours = $interval->h + ($interval->m > 0 ? 1 : 0);



            $kms = $bookingData[0]["end_km"] - $bookingData[0]["start_km"];

            $kmsTravelled = $kms - $carz_listing_details_data[0];

            $hrsTravelled = $hours - $carz_listing_details_data[1];



            $recieptCont = "<tr>

                                <td>Base Cost for " . ucwords(strtolower($bookingData[0]['service'])) . "  " . ucwords(strtolower($bookingData[0]['category'])) . " Car " . ucwords($bookingData[0]['package']) . " (" . date('d M y', strtotime($bookingData[0]['start_date'])) . ")</td>

                                <td class = 'cnt'>" . $carz_listing_details_data[0] . "</td>

                                <td class = 'cnt'>" . $carz_listing_details_data[1] . " Hours</td>

                                <td>" . $bc = $carz_listing_details_data[2] . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra km above " . $carz_listing_details_data[0] . " kms @ Rs." . $carz_listing_details_data[3] . " / km </td>

                                <td class = 'cnt'>" . ($kmsTravelled > 0 ? $kmsTravelled : 0) . "</td>

                                <td class = 'cnt'>-</td>

                                <td>" . $kc = ($kmsTravelled > 0 ? $kmsTravelled : 0) * $carz_listing_details_data[3] . "</td>

                            </tr>";





            $recieptCont .= "<tr>

                                <td>Extra hrs above " . $carz_listing_details_data[1] . " hrs  @ Rs." . $carz_listing_details_data[4] . " / hrs</td>

                                <td class = 'cnt'>-</td>

                                <td class = 'cnt'>" . ($hrsTravelled > 0 ? $hrsTravelled : 0) . " Hours</td>

                                <td>" . $hc = ($hrsTravelled > 0 ? $hrsTravelled : 0) * $carz_listing_details_data[4] . "</td>

                            </tr>";



            $amount = $bc + $kc + $hc;
        } else {



            $days = $interval->days + 1;



            $kms = $bookingData[0]["end_km"] - $bookingData[0]["start_km"];

            $kmsTravelled = $kms - $carz_listing_details_data[0] * $days;

            $amount = ($kmsTravelled <= 0 ? $carz_listing_details_data[0] * $days : $kms ) * $carz_listing_details_data[3] + $days * $carz_listing_details_data[5];













            $recieptCont = "<tr>

                                <td>Base Cost for " . ucwords(strtolower($bookingData[0]['service'])) . "  " . ucwords(strtolower($bookingData[0]['category'])) . " Car " . ucwords($bookingData[0]['package']) . " (" . date('d M y', strtotime($bookingData[0]['start_date'])) . " - " . date('d M y', strtotime($bookingData[0]['end_date'])) . ")</td>

                                <td class = 'cnt'>" . $carz_listing_details_data[0] * $days . "</td>

                                <td class = 'cnt'>" . $days . " Days</td>

                                <td>" . $bc = ($carz_listing_details_data[0] * $days * $carz_listing_details_data[3] ) + $carz_listing_details_data[5] * $days . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra km above " . $carz_listing_details_data[0] . " kms /- Day @ Rs." . $carz_listing_details_data[3] . " / km </td>

                                <td class = 'cnt'>" . ($kmsTravelled > 0 ? $kmsTravelled : 0) . "</td>

                                <td class = 'cnt'>-</td>

                                <td>" . $kc = ($kmsTravelled > 0 ? $kmsTravelled : 0) * $carz_listing_details_data[3] . "</td>

                            </tr>";







            $amount = $bc + $kc;



            $hours = $days;
        }



        $finalAmntNoST = ($amount + $extra + $toll + $permit + $parking - $discount);

        $finalAmnt = $finalAmntNoST + ($finalAmntNoST * ($st / 100)) - $prepaid;



        $bookingUpdate = Booking::find($id);

        $bookingUpdate->final_amt = ($finalAmnt + $prepaid);

        $bookingUpdate->update();

        return View::make('admin.pages.invoice', compact('bookingData', 'recieptCnt', 'recieptCont', 'kms', 'hours', 'amount', 'discount', 'extra', 'st', 'prepaid', 'finalAmnt', 'permit', 'parking', 'toll', 'finalAmntNoST'));
    }

    public function purchase_invoice($id) {



        $bookingData = Booking::leftJoin("customers", "customers.id", "=", "bookings.customer_id")
                        ->leftJoin("localities", "localities.id", "=", "bookings.locality_id")
                        ->leftJoin("vender_listings", "vender_listings.id", "=", "bookings.vender_listing_id")
                        ->leftJoin("services", "services.id", "=", "vender_listings.service_id")
                        ->leftJoin("cities", "cities.id", "=", "vender_listings.city_id")
                        ->leftJoin("packages", "packages.id", "=", "vender_listings.package_id")
                        ->leftJoin("categories", "categories.id", "=", "vender_listings.category_id")
                        ->leftJoin("venders", "venders.id", "=", "bookings.vender_id")
                        ->where("bookings.id", "=", $id)
                        ->get([ 'customers.fname', 'customers.lname', 'venders.venders_name', 'localities.locality', 'vender_listings.*', 'services.service', 'cities.city', 'packages.package', 'categories.category', 'bookings.*'])->toArray();



        $fromDate = new DateTime($bookingData[0]["start_date"]);

        $endDate = new DateTime($bookingData[0]["end_date"]);

        $interval = $fromDate->diff($endDate);

        $vendor_listing_details_data = json_decode($bookingData[0]["vendor_listing_details"], true);


//dd($vendor_listing_details_data[0]);
        $discount = $bookingData[0]["vendor_discount"];
        $st = $bookingData[0]["vendor_service_tax"];
        $prepaid = $bookingData[0]["vendor_prepaid_amt"];
        $extra = $bookingData[0]["vendor_extra_charges"];
        

        $toll = $bookingData[0]["toll"];

        $permit = $bookingData[0]["permit"];

        $parking = $bookingData[0]["parking"];



        if (preg_match("/local/i", $bookingData[0]["service"])) {


            $readings = json_decode($bookingData[0]["readings"], true);



            $stCnt = count(array_filter($readings[0]['StartKm']));

            $amount = 0;

            $kmz = 0;

            $hrz = 0;

            for ($i = 0; $i < $stCnt; $i++) {

                $kms = $readings[1]["EndKm"][$i] - $readings[0]["StartKm"][$i];




                $kmsTravelled = $kms - $vendor_listing_details_data[0];



                $kmz += $kmsTravelled > 0 ? $kmsTravelled : 0;



                $nfromDate = new DateTime($readings[2]["start_DATE"][$i]);

                $nendDate = new DateTime($readings[3]["end_DATE"][$i]);

                $ninterval = $nfromDate->diff($nendDate);



                $hrsTravelled = ($ninterval->h + ($ninterval->i > 1 ? 1 : 0)) - $vendor_listing_details_data[1];



                $hrz += $hrsTravelled > 0 ? $hrsTravelled : 0;
            }





            $kms = $kmz;



            $hours = $interval->days + 1;







            $recieptCont = "<tr>

                                <td>Base Cost for " . ucwords(strtolower($bookingData[0]['service'])) . "  " . ucwords(strtolower($bookingData[0]['category'])) . " Car " . ucwords($bookingData[0]['package']) . " (" . date('d M y', strtotime($bookingData[0]['start_date'])) . " - " . date('d M y', strtotime($bookingData[0]['end_date'])) . ")</td>

                                <td class = 'cnt'>" . $hours * $vendor_listing_details_data[0] . "</td>

                                <td class = 'cnt'>$hours Day/s</td>

                                <td>" . $bc = $hours * $vendor_listing_details_data[2] . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra km above " . $vendor_listing_details_data[0] . " kms /- Day @ Rs." . $vendor_listing_details_data[3] . " / km </td>

                                <td class = 'cnt'>$kmz</td>

                                <td class = 'cnt'>-</td>

                                <td>" . $kc = $kmz * $vendor_listing_details_data[3] . "</td>

                            </tr>";



            $recieptCont .= "<tr> 

                                <td>Extra hrs above " . $vendor_listing_details_data[1] . " hrs /- Day @ Rs." . $vendor_listing_details_data[4] . " / hrs</td>

                                <td class = 'cnt'>-</td>

                                <td class = 'cnt'>$hrz Hour/s</td>

                                <td>" . $hc = $hrz * $vendor_listing_details_data[4] . "</td>

                            </tr>";

            $amount = $bc + $kc + $hc;
        } elseif (preg_match("/airport/i", $bookingData[0]["service"])) {



            $hours = $interval->h + ($interval->m > 0 ? 1 : 0);



            $kms = $bookingData[0]["end_km"] - $bookingData[0]["start_km"];

            $kmsTravelled = $kms - $vendor_listing_details_data[0];

            $hrsTravelled = $hours - $vendor_listing_details_data[1];



            $recieptCont = "<tr>

                                <td>Base Cost for " . ucwords(strtolower($bookingData[0]['service'])) . "  " . ucwords(strtolower($bookingData[0]['category'])) . " Car " . ucwords($bookingData[0]['package']) . " (" . date('d M y', strtotime($bookingData[0]['start_date'])) . ")</td>

                                <td class = 'cnt'>" . $vendor_listing_details_data[0] . "</td>

                                <td class = 'cnt'>" . $vendor_listing_details_data[1] . " Hours</td>

                                <td>" . $bc = $vendor_listing_details_data[2] . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra km above " . $vendor_listing_details_data[0] . " kms @ Rs." . $vendor_listing_details_data[3] . " / km </td>

                                <td class = 'cnt'>" . ($kmsTravelled > 0 ? $kmsTravelled : 0) . "</td>

                                <td class = 'cnt'>-</td>

                                <td>" . $kc = ($kmsTravelled > 0 ? $kmsTravelled : 0) * $vendor_listing_details_data[3] . "</td>

                            </tr>";





            $recieptCont .= "<tr>

                                <td>Extra hrs above " . $vendor_listing_details_data[1] . " hrs  @ Rs." . $vendor_listing_details_data[4] . " / hrs</td>

                                <td class = 'cnt'>-</td>

                                <td class = 'cnt'>" . ($hrsTravelled > 0 ? $hrsTravelled : 0) . " Hours</td>

                                <td>" . $hc = ($hrsTravelled > 0 ? $hrsTravelled : 0) * $vendor_listing_details_data[4] . "</td>

                            </tr>";



            $amount = $bc + $kc + $hc;
        } else {



            $days = $interval->days + 1;



            $kms = $bookingData[0]["end_km"] - $bookingData[0]["start_km"];

            $kmsTravelled = $kms - $vendor_listing_details_data[0] * $days;

            $amount = ($kmsTravelled <= 0 ? $vendor_listing_details_data[0] * $days : $kms ) * $vendor_listing_details_data[3] + $days * $vendor_listing_details_data[5];













            $recieptCont = "<tr>

                                <td>Base Cost for " . ucwords(strtolower($bookingData[0]['service'])) . "  " . ucwords(strtolower($bookingData[0]['category'])) . " Car " . ucwords($bookingData[0]['package']) . " (" . date('d M y', strtotime($bookingData[0]['start_date'])) . " - " . date('d M y', strtotime($bookingData[0]['end_date'])) . ")</td>

                                <td class = 'cnt'>" . $vendor_listing_details_data[0] * $days . "</td>

                                <td class = 'cnt'>" . $days . " Days</td>

                                <td>" . $bc = ($vendor_listing_details_data[0] * $days * $vendor_listing_details_data[3] ) + $vendor_listing_details_data[5] * $days . "</td>

                            </tr>";



            $recieptCont .= "<tr>

                                <td>Extra km above " . $vendor_listing_details_data[0] . " kms /- Day @ Rs." . $vendor_listing_details_data[3] . " / km </td>

                                <td class = 'cnt'>" . ($kmsTravelled > 0 ? $kmsTravelled : 0) . "</td>

                                <td class = 'cnt'>-</td>

                                <td>" . $kc = ($kmsTravelled > 0 ? $kmsTravelled : 0)  * $vendor_listing_details_data[3] . "</td>

                            </tr>";







            $amount = $bc + $kc;



            $hours = $days;
        }





        $finalAmntNoST = ($amount + $extra + $toll + $permit + $parking - $discount);

        $finalAmnt = $finalAmntNoST + ($finalAmntNoST * ($st / 100)) - $prepaid;



        $bookingUpdate = Booking::find($id);

        $bookingUpdate->final_amt = ($finalAmnt + $prepaid);

        $bookingUpdate->update();

        return View::make('admin.pages.sale_invoice', compact('bookingData', 'recieptCnt', 'recieptCont', 'kms', 'hours', 'amount', 'discount', 'extra', 'st', 'prepaid', 'finalAmnt', 'permit', 'parking', 'toll', 'finalAmntNoST'));
    }

}
