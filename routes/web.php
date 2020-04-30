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

Route::get('testcupas', 'HomeController@testCupas');

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Clear Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/profile/{id}', 'HomeController@profile');
Route::get('/calendar/eve', 'HomeController@eve');

//AdminsControllerRoutes
Route::resource('admins', 'AdminsController');
Route::get('admins/destroy/{id}','AdminsController@destroy');

//UsersControllerRoutes
Route::resource('users', 'UsersController');
Route::get('users/destroy/{id}','UsersController@destroy');

//OwnersControllerRoutes
Route::resource('owners', 'OwnersController');
Route::get('owners/destroy/{id}','OwnersController@destroy');

//BookControllerRoutes
Route::resource('bookings', 'BookController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit'
]]);

//AmenitiesControllerRoutes
Route::resource('amenities', 'AmenitiesController');
Route::get('amenities/destroy/{id}','AmenitiesController@destroy');
Route::patch('amenitiespicture/{id}','AmenitiesController@updatePicture');

//PlacesControllerRoutes
Route::resource('places', 'PlacesController');
Route::get('places/destroy/{id}','PlacesController@destroy');
Route::patch('places/{id}','PlacesController@updatePicture');

//SpecialOffersControllerRoutes
Route::resource('specialoffers', 'SpecialOffersController');
Route::get('specialoffers/destroy/{id}','SpecialOffersController@destroy');

//NotificationsControllerRoutes
Route::resource('notifications', 'NotificationsController', ['except' => [
    'update', 'edit','show',
]]);
Route::get('notifications/destroy/{id}','NotificationsController@destroy');

Route::get('ownerplaces/destroy/{id}','OwnerPlacesController@destroy');
Route::resource('ownerplaces', 'OwnerPlacesController');
Route::patch('ownerplaces/{id}','OwnerPlacesController@updatePicture');

Route::resource('ownerbookings', 'OwnerBookingController', ['except' => [
    'create', 'store', 'update', 'destroy', 'edit'
]]);

Route::get('changepassword','HomeController@getchangePassword');

Route::patch('changepassword','HomeController@changePassword');

Route::post('validate-registration-step','registrationStepsValidatorController@validateStep')->name('validate.step');
Route::get('registration-intro',[
    'uses' => 'Auth\RegisterController@showRegistrationIntroPage',
    'as' => 'registration.intro'
]);
Route::post('register', 'Auth\\RegisterController@register');

Route::post('validate-image',[
    'uses' => 'registrationStepsValidatorController@validateImage',
    'as' => 'validate.image'
]);

Route::post('delete-place-image',[
    'uses' => 'PlacesController@deletePlaceImage',
    'as' => 'delete.place.image'
]);

Route::put('update-place-price-offer/{placeId}',[
    'uses' => 'PlacesController@updatePriceOffer',
    'as' => 'update.place.priceOffer'
]);
