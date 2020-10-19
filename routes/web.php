<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


/* FrontEnd Location */
Route::get('/','IndexController@index');
Route::any ( '/search',  'IndexController@search');
Route::get('/list-products','IndexController@shop');
Route::get('/cat/{id}/','IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}/','IndexController@detialpro');
///// get Attribute ////////////
Route::get('/get-product-attr','IndexController@getAttrs');
///// Cart Area /////////
// Route::post('/addToCart','CartController@addToCart')->name('addToCart');
// Route::get('/viewcart','CartController@index');
// Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
// Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');



// Simple Regitration/Login

Route::get('/learning-institutions','UsersController@learninginstitute');
Route::get('/faith-based-institution','UsersController@faithinstituion');
Route::get('/government-institution','UsersController@governmentinstitute');
Route::get('/ngo','UsersController@ngoinstitute');
Route::get('/private-institution','UsersController@privateinstitute');
Route::get('/prequalification','UsersController@prequalification');

Route::post('/register_user','UsersController@register')->name('user.register');

Route::get('/user/verify/{token}', 'UsersController@verifyUser'); //

/// Simple User Login /////
Route::get('/login_page','UsersController@index')->name('usr_login');
Route::post('/user_login','UsersController@login');
Route::get('/logout_user','UsersController@logout')->name('usr_logout');

////// Clients Authentications ///////////
Route::group(['middleware'=>'clientlogin'],function (){

    Route::get('/client_account','UsersController@u_dashboard')->name('client.dashboard');
    Route::get('/client_products_list','UsersController@products')->name('product.list');
    Route::get('/client_profile','UsersController@u_profile')->name('client.profile');
    Route::get('/order_status','UsersController@order_sttus')->name('order.status');
    Route::get('/client_order_delete/{id}','UsersController@client_delete_order')->name('client.order.delete');
    Route::get('/invoice_status','UsersController@invoice_sttus')->name('status.invoice');
    Route::get('/statement_status','UsersController@statement_sttus')->name('status.statement');
    Route::get('/invoice_download','UsersController@invoicedownloadcsv')->name('client.invoice.download');


    // Cart Section
    Route::post('/addCart','CartController@addToCart')->name('clientAddToCart');
    Route::get('/viewcart','CartController@index');
    Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
    Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');

    Route::get('/check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/order-review','OrdersController@index');
    Route::post('/submit-order','OrdersController@order');
    Route::get('/cod','OrdersController@cod');
    Route::get('/paypal','OrdersController@paypal');

    Route::get('/complains', 'UsersController@logde_complain')->name('complain');
    Route::post('/complain_data_upload', 'UsersController@complain_data')->name('complain_upload');
    Route::get('/complain_data_delete/{id}', 'UsersController@complain_data_delete')->name('errase_complain_data');

    Route::post('/product/cat', 'UsersController@productcat')->name('product.cat');








    // credit_debit data
    Route::get('/get-client-credit-debt','UsersController@cd_credit')->name('client.credit');

    // credit data
    Route::get('/get-client-credit/{id}','UsersController@c_credit')->name('client.credit');
    // debt data
    Route::get('/get-client-debt/{id}','UsersController@c_debt')->name('client.debt');


});
///

// Admin Routes

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');
    Route::get('/pending_clients', 'AdminController@pending_clients')->name('pending_clients');
    Route::get('/approved_clients', 'AdminController@approved_clients')->name('approved_clients');
    Route::post('/approving_client/{id}', 'AdminController@approving_client')->name('approving_client');

    Route::get('/view_client/{id}', 'AdminController@view_client')->name('view_client');
    Route::get('/view_approved_client/{id}', 'AdminController@view_ap_client')->name('view_approved_client');

    Route::get('/approved_order', 'AdminController@aprovd_order')->name('approved_order');
    Route::get('/pending_order', 'AdminController@pending_order')->name('pending_order');
    Route::get('/view_order/{id}', 'AdminController@viu_order')->name('view_order');//order to approve
    Route::get('/view_app_order/{id}', 'AdminController@viu_app_order')->name('view_approved_order');//order to viu
    Route::get('/approving_order/{id}', 'AdminController@aproving_order')->name('approving_order');
    Route::get('/delete_order/{id}', 'AdminController@order_destroy')->name('delete_order');


    Route::post('/update_client/{id}','AdminController@updte_client')->name('update_client');
    Route::get('/edit_client/{id}', 'AdminController@edit_client')->name('edit_client');
    Route::get('/delete_client/{id}', 'AdminController@delete_client')->name('delete_client');
    Route::get('/updated_client','AdminController@show_client')->name('updated_client');


    // /// Category Area
    Route::resource('/category','ProductCategoryController');

    // /// Products Area
    Route::resource('/product','ProductsController');


    /// Product Attribute
    Route::resource('/product_attr','ProductAttribController');
    Route::get('delete-attribute/{id}','ProductAttribController@deleteAttr');

     /// Product Images Gallery
     Route::resource('/image-gallery','ImagesController');



      // COMPLAIN URL
    Route::get('/complain_list', 'AdminController@list_complains')->name('complain_list');
    Route::get('/complain_view/{id}', 'AdminController@view_complain')->name('complain_view');
    Route::get('/complain_approve/{id}', 'AdminController@approve_complain')->name('complain_approve');
    Route::post('/complain_response/{id}', 'AdminController@complain_response')->name('complain_response');

    // SubAdmins URLs
    Route::group(['prefix'=>'create'],function (){
    Route::get('/subadmin', 'AdminController@createsubdmins')->name('create.subadmin');
    Route::post('/role/store', 'AdminController@registerrole')->name('role.store');
    // Route::get('/role', 'AdminController@createsubdmins')->name('role');
    // Route::get('/role/delete/{id}', 'AdminController@createsubdmins')->name('role.delete');

    Route::post('/admin/store', 'AdminController@registeradmin')->name('admin.store');
    // Route::post('/admin', 'AdminController@createsubdmins')->name('admin');
    // Route::post('/admin/delete/{id}', 'AdminController@createsubdmins')->name('admin.delete');

    });



});

// HUMAN RESOURCE ULS
Route::group(['prefix'=>'humanResource','middleware'=>['auth','subadmin']],function (){
    Route::get('/','AdminController@hrindex')->name('hr');
    Route::get('/staff/order/view/{id}', 'AdminController@hrViewStafforder')->name('hrviewStafforder');//order to approve
    Route::get('/staff/order/approved','AdminController@hrStaffApprovedOrder')->name('hrApprovedStaffOrder');
    Route::get('/staff/order/approving/{id}', 'AdminController@hrApprovingOrder')->name('hrApprovingOrder');
    Route::get('/staff/order/approved/view/{id}', 'AdminController@otherAdminsViewApprovedOrder')->name('hrViewApprovedOrder');//order to viu
    Route::get('/staff/order/{id}','AdminController@previledgeUserDeleteOrder');
});

// ACCOUNTS ULS
Route::group(['prefix'=>'accounts','middleware'=>['auth','subadmin']],function (){
    Route::get('/','AdminController@acindex')->name('ac');
    Route::get('/staff/order/view/{id}', 'AdminController@acViewStafforder')->name('acviewStafforder');//order to approve
    Route::get('/staff/order/approved','AdminController@acStaffApprovedOrder')->name('acApprovedStaffOrder');
    Route::get('/staff/order/approving/{id}', 'AdminController@acApprovingOrder')->name('acApprovingOrder');
    Route::get('/staff/order/approved/view/{id}', 'AdminController@otherAdminsViewApprovedOrder')->name('acViewApprovedOrder');//order to viu
    Route::get('/staff/order/{id}','AdminController@previledgeUserDeleteOrder');


});

 // WAREHOUSE MANAGER ULS
 Route::group(['prefix'=>'warehouseManager','middleware'=>['auth','subadmin']],function (){
    Route::get('/','AdminController@whmgrindex')->name('wmgr');
    Route::get('/staff/order/view/{id}', 'AdminController@whmgrViewStafforder')->name('wrviewStafforder');//order to approve
    Route::get('/staff/order/approved','AdminController@whmgrStaffApprovedOrder')->name('whmgrApprovedStaffOrder');
    Route::get('/staff/order/approving/{id}', 'AdminController@whmgrApprovingOrder')->name('whmgrApprovingOrder');
    Route::get('/staff/order/approved/view/{id}', 'AdminController@otherAdminsViewApprovedOrder')->name('otherAdminsViewApprovedOrder');//order to viu
    Route::get('/staff/order/delete/{id}','AdminController@previledgeUserDeleteOrder');

});


// Stuff Routes

Route::group(['prefix'=>'staff','middleware'=>['auth','staff']],function (){
    Route::get('/', 'StaffController@index')->name('staff.home');
    Route::get('/product/prescription','StaffController@prescription_products')->name('prescription.product.list');
    Route::get('/product/general','StaffController@general_products')->name('general.product.list');

    Route::post('/product/general/cat', 'StaffController@generalproductcat')->name('general.product.cat');
    Route::post('/product/prescription/cat', 'StaffController@prescriptionproductcat')->name('prescription.product.cat');

        // Cart Section
        Route::post('/addToCart','StaffController@addToCart')->name('addToCart');
        Route::get('/viewcart','StaffController@viewcart')->name('view.cart');
        Route::get('/cart/deleteItem/{id}','CartController@deleteItem')->name('delete');
        Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity')->name('update');

        Route::get('/checkout','StaffController@viewcheckout')->name('checkout.view');
        Route::post('/checkout/submit','StaffController@submitcheckout')->name('checkout.submit');
        Route::get('/order/review','StaffController@orderreview')->name('order.review');
        Route::post('/order/submit','StaffController@order')->name('order.submit');
        Route::get('/cod','StaffController@cod')->name('cod');
        Route::get('/paypal','OrdersController@paypal')->name('paypal');


    Route::post('/product/prescription/cat','StaffController@prescriptionproductcat')->name('pres.product.cat');
    Route::post('/product/general/cat','StaffController@generalproductcat')->name('gen.product.cat');



    Route::get('/order/view/wrmgr','StaffController@viewWrMgrOrder')->name('viewOrderInWhMgr');
    Route::get('/order/view/hr','StaffController@viewHROrder')->name('viewOrderInHR');
    Route::get('/order/view/ac','StaffController@viewAcOrder')->name('viewOrderInAc');
    Route::get('/order/view/dispached','StaffController@dispatchedOrder')->name('viewOrderInDispatch');


});


//


