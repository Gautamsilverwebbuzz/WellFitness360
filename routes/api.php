<?php

header('Access-Control-Allow-Origin: *,*');
header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
	Route::post('login','LoginController@loginCheck');
	Route::post('user-register','LoginController@userRegister');
	Route::post('trainer-register','LoginController@trainerRegister');
	Route::post('physique','LoginController@Physique');
	Route::post('forgotpassword','LoginController@forgotpassword');
	Route::post('changepassword','LoginController@changePassword');
	Route::post('appRedirectForgetPassword','LoginController@appRedirectForgetPassword');
	Route::post('verifyAccount','LoginController@verifyAccount');

	Route::post('profile','UserController@profile');
	Route::get('get-profile/{id}','UserController@getProfile');
	Route::get('categoeries','UserController@categoeries');
	Route::get('subcategoeries/{id}','UserController@subcategoeries');
	Route::get('subCategoriesDetails/{id}','UserController@subCategoriesDetails');
	Route::get('trainerList','UserController@trainerList');
	Route::get('user-trainer-activity','UserController@userandtraineractivity');
	Route::post('add-availability','UserController@addtraineravailbilty');
	Route::post('get-trainer-category','UserController@trainercategory');
	Route::post('serachTrainer','UserController@serachTrainer');
	

});
