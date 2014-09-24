<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', 'PagesController@home');
Route::get('/booking/{id}/', 'BookingController@booking');
Route::get('/payment/', array('as' => 'payment', 'uses' => 'BookingController@payment'));

Route::get('/about', array('as' => 'about', 'uses' => function() {
return View::make('frontend.pages.about');
}));

Route::get('/terms-conditions', array('as' => 'terms-conditions', 'uses' => function() {
return View::make('frontend.pages.terms_conditions');
}));

Route::get('/privacy-policy', array('as' => 'privacy-policy', 'uses' => function() {
return View::make('frontend.pages.privacy_policy');
}));

Route::get('/partner-with-us', array('as' => 'partner-with-us', 'uses' => 'PagesController@partner_with_us'));
Route::post('/save_partner', array('as' => 'save_partner', 'uses' => 'PagesController@save_partner'));


Route::get('/contact', array('as' => 'contact', 'uses' => 'PagesController@contact'));
Route::post('/save_contact', array('as' => 'save_contact', 'uses' => 'PagesController@save_contact'));

Route::get('/careers', array('as' => 'careers', 'uses' => 'PagesController@careers'));
Route::post('/save_career', array('as' => 'save_career', 'uses' => 'PagesController@save_career'));

Route::post('/booking-success', array('as' => 'booking-success', 'uses' => 'BookingController@response'));

Route::get('/quick-pay', array('as' => 'quick-pay', 'uses' => function() {
return View::make('frontend.pages.quickpay');
}));


Route::get('/thank-you', array('as' => 'thank-you', 'uses' => function() {
return View::make('frontend.pages.thank_you');
}));

Route::post('local', 'PagesController@local');
Route::post('outstation', 'PagesController@outstation');
Route::post('airport-transfer', 'PagesController@airport');
Route::post('get_customer', 'BookingController@booking_get_customer');
Route::post('proceed', array('as' => 'save_booking', 'uses' => 'BookingController@save_booking'));

Route::get('/register', array('as' => 'register', 'uses' => 'PagesController@register'));

Route::get('/login', array('as' => 'login', 'uses' => 'PagesController@login'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'PagesController@logout'));


Route::post('/save_register', array('as' => 'save_register', 'uses' => 'PagesController@save_register'));

Route::post('/check_login', array('as' => 'check_login', 'uses' => 'PagesController@check_login'));

Route::get('/edit_profile', array('as' => 'edit_profile', 'uses' => 'PagesController@edit_profile'));
Route::post('/update_edit_profile', array('as' => 'update_edit_profile', 'uses' => 'PagesController@update_edit_profile'));

Route::get('/change_password', array('as' => 'change-password', 'uses' => 'PagesController@change_password'));

Route::post('/check_change_password', array('as' => 'check_change_password', 'uses' => 'PagesController@check_change_password'));
Route::get('/forgot_password', array('as' => 'forgot_password', 'uses' => 'PagesController@forgot_password'));
Route::post('/check_forgot_password', array('as' => 'check_forgot_password', 'uses' => 'PagesController@check_forgot_password'));

Route::get('/email', function() {
    return View::make('frontend.pages.email');
});

Route::get('/success_mail', function() {
    return View::make('frontend.pages.success_mail');
});

Route::get('/reset-password/{email_id}', array('as' => 'reset_password', 'uses' => 'PagesController@reset_password'));

Route::post('/check_reset_password', array('as' => 'check_reset_password', 'uses' => 'PagesController@check_reset_password'));


Route::group(array('prefix' => 'admin'), function() {

    Route::get('/', function() {
        return View::make('admin.pages.dashboard');
    });

    Route::get('/login', function() {
        return View::make('admin.pages.login');
    });

    Route::get('/master/cities', array('as' => 'cities', 'uses' => 'AdminController@cities'));
    Route::get('/master/city_delete/{id}', array('as' => 'city_delete', 'uses' => 'AdminController@city_delete'));
    Route::post('/master/cities_edit', array('as' => 'cities_edit', 'uses' => 'AdminController@cities_edit'));
    Route::post('/master/save_cities', array('as' => 'save_cities', 'uses' => 'AdminController@save_cities'));

    Route::get('/master/localities', array('as' => 'localities', 'uses' => 'AdminController@localities'));
    Route::get('/master/locality_delete/{id}', array('as' => 'locality_delete', 'uses' => 'AdminController@locality_delete'));
    Route::post('/master/locality_edit', array('as' => 'locality_edit', 'uses' => 'AdminController@locality_edit'));
    Route::post('/master/save_locality', array('as' => 'save_locality', 'uses' => 'AdminController@save_locality'));

    Route::get('/master/categories', array('as' => 'categories', 'uses' => 'AdminController@categories'));
    Route::get('/master/category_delete/{id}', array('as' => 'category_delete', 'uses' => 'AdminController@category_delete'));
    Route::post('/master/category_edit', array('as' => 'category_edit', 'uses' => 'AdminController@category_edit'));
    Route::post('/master/save_category', array('as' => 'save_category', 'uses' => 'AdminController@save_category'));

    Route::get('/master/packages', array('as' => 'packages', 'uses' => 'AdminController@packages'));
    Route::get('/master/package_delete/{id}', array('as' => 'package_delete', 'uses' => 'AdminController@package_delete'));
    Route::post('/master/package_edit', array('as' => 'package_edit', 'uses' => 'AdminController@package_edit'));
    Route::post('/master/save_package', array('as' => 'save_package', 'uses' => 'AdminController@save_package'));

    Route::get('/master/services', array('as' => 'services', 'uses' => 'AdminController@services'));
    Route::get('/master/service_delete/{id}', array('as' => 'service_delete', 'uses' => 'AdminController@service_delete'));
    Route::post('/master/service_edit', array('as' => 'service_edit', 'uses' => 'AdminController@service_edit'));
    Route::post('/master/save_service', array('as' => 'save_service', 'uses' => 'AdminController@save_service'));

    Route::get('/carz_listing', array('as' => 'carz_listing', 'uses' => 'AdminController@carz_listing'));
    Route::get('/master/listing_delete/{id}', array('as' => 'listing_delete', 'uses' => 'AdminController@listing_delete'));
    Route::post('/save_listing', array('as' => 'save_listing', 'uses' => 'AdminController@save_listing'));
    Route::post('/master/listing_edit', array('as' => 'listing_edit', 'uses' => 'AdminController@listing_edit'));

    Route::get('/master/orders', array('as' => 'orders', 'uses' => 'AdminController@orders'));
    Route::get('/master/order_delete/{id}', array('as' => 'order_delete', 'uses' => 'AdminController@order_delete'));
    Route::post('/save_order', array('as' => 'save_order', 'uses' => 'AdminController@save_order'));
    Route::post('/master/order_edit', array('as' => 'order_edit', 'uses' => 'AdminController@order_edit'));

    Route::get('/master/venders', array('as' => 'venders', 'uses' => 'AdminController@venders'));
    Route::post('/save_vender', array('as' => 'save_vender', 'uses' => 'AdminController@save_vender'));
    Route::get('/master/vender_delete/{id}', array('as' => 'vender_delete', 'uses' => 'AdminController@vender_delete'));
    Route::post('/master/vender_edit', array('as' => 'vender_edit', 'uses' => 'AdminController@vender_edit'));


    Route::get('/master/contact_enquiries', array('as' => 'contact_enquiries', 'uses' => 'AdminController@contact_enquiries'));
    Route::get('/master/career_requests', array('as' => 'career_requests', 'uses' => 'AdminController@career_requests'));
    Route::get('/master/partners_with_us', array('as' => 'partners_with_us', 'uses' => 'AdminController@partners_with_us'));

    Route::get('/master/invoice/{id}', array('as' => 'invoice', 'uses' => 'AdminController@invoice'));

   Route::get('/drivers_dropdown/{id}', 'AdminController@drivers_dropdown');
});
