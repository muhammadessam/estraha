<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/testlang', function (Request $request) {
        return array(
            1 => "John",
            2 => "Mary",
            3 => "Steven"
        );
    });
    Route::get('place/types', 'Api\PlaceController@getPlaceTypes');

    Route::get('places/{type?}', 'Api\PlaceController@getPlaces');                           //header

    Route::get('getPlaceAmenities/{place_id}', 'Api\PlaceAmenitiesController@getPlaceAmenities');

    Route::get('user/profile', 'Api\UserController@getUserProfile');                        //body
    Route::post('updateProfile', 'Api\UserController@updateProfile');                        //body
    Route::post('uploadProfilePic','Api\UserController@uploadProfilePic');

    Route::post('changePassword', 'Api\UserController@changePassword');                      //body

    Route::post('device/token', 'Api\UserController@deviceToken');                            //body

    Route::get('searchPlace', 'Api\SearchController@searchPlace');                           //header

    Route::post('bookPlace/{place_id}', 'Api\BookingController@bookPlace');                  //body

    Route::get('getTopBooking', 'Api\BookingController@getTopBooking');

    Route::post('review', 'Api\ReviewsController@review');                                    //body

});

Route::post('user/confirmation', 'Api\UserConfirmationController@postConfirmation');      //body
Route::post('registerUser', 'Api\UserController@registerUser');                        //body
Route::post('sendResetCode', 'Api\ResetPasswordController@postSentCode');              //body
Route::post('resetPassword', 'Api\ResetPasswordController@postResetPassword');         //body