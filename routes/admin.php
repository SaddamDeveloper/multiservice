<?php
/***
 * Admin Login Control
 */
Route::get('/admin/login', 'Admin\AdminLoginController@showAdminLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\AdminLoginController@adminLogin');
Route::post('/admin/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware'=>'auth:admin','prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/dashboard', 'AdminPagesController@index')->name('admin.dashboard');
    Route::get('/merchant/category', 'AdminPagesController@merchantCategory')->name('admin.merchant_category');
    // Services
    Route::get('/service', 'AdminPagesController@service')->name('admin.service');
    Route::get('/add/service', 'AdminPagesController@addService')->name('admin.add_service');
    Route::post('/store/service', 'AdminPagesController@storeService')->name('admin.store.add_service');
    Route::get('/service/list', 'AdminPagesController@serviceList')->name('admin.ajax.service_list');

    // Vehicles
    Route::get('/vehicle/page', 'AdminPagesController@vehicleTypePage')->name('admin.vehicle_type_page');
    Route::get('/vehicle/type', 'AdminPagesController@vehicleType')->name('admin.vehicle_type');
    Route::post('/store/vehicle', 'AdminPagesController@storeVehicleType')->name('admin.store_vehicle_type');
    Route::get('/vehicle/list', 'AdminPagesController@vehicleList')->name('admin.ajax.vehicle_list');
    
    // Merchant Category
    Route::post('/store/category', 'AdminPagesController@storeCategory')->name('admin.store.category');
    Route::get('/category/list', 'AdminPagesController@categoryList')->name('admin.ajax.category_list');

    
});