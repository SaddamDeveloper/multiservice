<?php
/***
 * Driver Login Control
 */
Route::get('/driver/login', 'Driver\DriverLoginController@showDriverLoginForm')->name('driver.login');
Route::post('/driver/login', 'Driver\DriverLoginController@driverLogin');
Route::post('/driver/logout', 'Driver\DriverLoginController@logout')->name('driver.logout');