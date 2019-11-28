<?php


Route::get('/', 'WebsiteController@index');
Route::get('/shop', 'WebsiteController@shopView');
Route::get('/contact', 'WebsiteController@contactView');
Route::get('/add-to-cart/{id}', 'WebsiteController@addToCart');
Route::get('/cart', 'WebsiteController@cartPageview');
Route::get( '/remove-from-cart/{cart_id}/{user_id}', 'WebsiteController@removeFromCart');
Route::get('/checkout', 'WebsiteController@procedeTocheckoutView');
Route::post('/to-checkout', 'WebsiteController@procedeTocheckout');

Route::get('/login', 'SecuritysController@view')->name('login');
Route::post('/login', 'SecuritysController@index');
Route::get('/logout', 'SecuritysController@destroy');
Route::get('/register/{username}/{password}', 'SecuritysController@register');


Route::get('/dashboard', 'DashboardController@index')->middleware('auth');
Route::get('/dashboard/products', 'DashboardController@productsIndex')->middleware('auth');
Route::get( '/dashboard/products/add', 'DashboardController@productsAddView')->middleware('auth');
Route::post( '/dashboard/products/add', 'DashboardController@productsAdd')->middleware('auth');
Route::get('/dashboard/product/remove/{id}', 'DashboardController@productsRemove')->middleware('auth');

Route::get('/dashboard/orders', 'DashboardController@ordersIndex')->middleware('auth');
Route::get('/dashboard/order/remove/{id}', 'DashboardController@orderRemove')->middleware('auth');
