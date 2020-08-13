<?php
/***
 * Merchant Login Control
 */
Route::get('/merchant/login', 'Merchant\MerchantLoginController@showMerchantLoginForm')->name('merchant.login');
Route::post('/merchant/login', 'Merchant\MerchantLoginController@merchantLogin');
Route::post('/merchant/logout', 'Merchant\MerchantLoginController@logout')->name('merchant.logout');