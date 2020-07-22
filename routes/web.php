<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
	return view('Frontend.home');
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

// Facebook Login
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

// Instagram Login
Route::get('login/instagram','Auth\LoginController@redirectToInstagramProvider')->name('instagram.login');
Route::get('login/instagram/callback', 'Auth\LoginController@instagramProviderCallback')->name('instagram.login.callback');

//Google login
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::group(['namespace' => 'Auth'], function () {
	Route::get('/admin/logout', 'LoginController@logout')->name('/admin/logout');
	Route::match(['GET', 'POST'], '/admin/login', 'LoginController@index')->name('/admin/login');
	Route::match(['GET', 'POST'], '/admin/check-email-not-register', 'LoginController@checkEmailRegister')->name('/admin/emailnotregister');
	Route::match(['GET', 'POST'], '/admin/register', 'RegisterController@register')->name('/admin/register');
	Route::match(['GET', 'POST'], '/admin/check-email-register', 'RegisterController@EmailCheckRegister')->name('/admin/emailregister');
	Route::match(['GET', 'POST'], '/admin/verifyAccount/{token}', 'RegisterController@verifyAccount')->name('/admin/verifyAccount');
	Route::match(['GET', 'POST'], '/admin/changePassword', 'LoginController@changePassword')->name('/admin/changePassword');
	Route::match(['GET', 'POST'], '/admin/forgetPassword', 'ForgotPasswordController@forgetPassword')->name('/admin/forgetPassword');
	Route::match(['GET', 'POST'], '/admin/resetPassword', 'ForgotPasswordController@resetPassword')->name('/admin/resetPassword');
});
//Auth::routes();

// Redirect user role wise
Route::get('/home', 'HomeController@index')->name('home');

// If redirect admin
Route::group(['middleware' => ['auth:web'], 'namespace' => 'Backend'], function () {
	Route::get('/admin', 'DashboardController@index')->name('admin');
	// Route::get('/user', 'DashboardController@index')->name('user');
	// Route::get('/trainer', 'DashboardController@index')->name('trainer');
	Route::get('/admin/dashboard', 'DashboardController@index')->name('/admin/dashboard');
	

	
	Route::get('/user-trainer-activity', 'DashboardController@UserandTrainerActivity')->name('user-trainer-activity');
	Route::post('/save-user-trainer-activity', 'DashboardController@saveUserandTrainerActivity')->name('save-user-trainer-activity');

	//Module management
	Route::get('/module/delete/{id}', 'ModulesController@destroy');
	Route::resource('module', 'ModulesController');

	// Roles & Permission Module
	Route::get('/rolepermission/delete/{id}', 'ModulesController@destroy');
	Route::resource('rolepermission', 'RolesPermissionController');

	// Trainer Management
	Route::get('/trainerManagement/delete/{id}', 'TrainerController@destroy');
	Route::get('/trainerManagement/apporved/{id}', 'TrainerController@apporved');
	Route::resource('trainerManagement', 'TrainerController');

	// User Management
	Route::get('/UserManagement/delete/{id}', 'UserController@destroy');
	Route::match(['GET', 'POST'], 'check-email-register', 'UserController@EmailCheckRegister')->name('emailregister');
	Route::resource('UserManagement', 'UserController');

	// Trainer Categories Management
	Route::get('/trainercategoriesManagement/edit/{id}', 'TrainerCategoriesController@edit');
	Route::post('/trainercategoriesManagement/update/{id}', 'TrainerCategoriesController@update')->name('trainercategoriesManagement.update');
	Route::get('/trainercategoriesManagement/delete/{id}', 'TrainerCategoriesController@destroy');
	Route::resource('trainercategoriesManagement', 'TrainerCategoriesController');

	// Categories Management
	Route::get('/categoriesManagement/delete/{id}', 'CategoriesController@destroy');
	Route::resource('categoriesManagement', 'CategoriesController');

	// Sub Categories Management
	Route::get('/subcategoriesManagement/delete/{id}', 'SubCategoriesController@destroy');
	Route::resource('subcategoriesManagement', 'SubCategoriesController');

	// Event Management
	Route::get('/eventManagement/delete/{id}', 'EventController@destroy');
	Route::resource('eventManagement', 'EventController');

	// Subscription Management
	Route::get('/SubscriptionPlanManagement/delete/{id}', 'SubscriptionPlanController@destroy');
	Route::resource('SubscriptionPlanManagement', 'SubscriptionPlanController');
	
	// Blog Management
	Route::get('/blogManagement/delete/{id}', 'BlogController@destroy');
	Route::resource('blogManagement', 'BlogController');

	// CMS-Pages Managment
	Route::match(['GET', 'POST'], 'cms_aboutus', 'CMSPagesController@aboutUs')->name('cms_aboutus');
	Route::match(['GET', 'POST'], 'cms_contactus', 'CMSPagesController@contactus')->name('cms_contactus');

	// Site Setting
	Route::get('/setting', 'SettingController@siteSetting')->name('setting');
	Route::put('/setting/update', 'SettingController@update')->name('settingUpdate');

	// E-shop Management
	Route::get('/E_shopManagement/delete/{id}', 'EshopController@destroy');
	Route::resource('E_shopManagement', 'EshopController');

	// Fees Management
	Route::get('/FeesManagement/delete/{id}', 'FeesController@destroy');
	Route::resource('FeesManagement', 'FeesController');

});


/*Trainer Route START*/
Route::get('/trainer/logout', 'Trainer\LoginController@logout')->name('/trainer/logout');
Route::match(['GET', 'POST'], 'trainer/login', 'Trainer\LoginController@index');
Route::match(['GET', 'POST'], 'trainer/login-check', 'Trainer\LoginController@loginCheck')->name('trainer/login-check');
Route::match(['GET', 'POST'], 'trainer/check-email', 'Trainer\LoginController@checkEmail')->name('trainer/check-email');
Route::match(['GET', 'POST'], '/trainer/forgetPassword', 'Trainer\ForgotPasswordController@forgetPassword')->name('/trainer/forgetPassword');
Route::match(['GET', 'POST'], '/trainer/resetPassword', 'Trainer\ForgotPasswordController@resetPassword')->name('/trainer/resetPassword');
Route::group(['middleware' => 'trainerlogin','namespace' => 'Trainer'], function () {
	Route::get('/trainer/dashboard', 'DashboardController@index')->name('/trainer/dashboard');
	Route::match(['GET', 'POST'], '/trainer/changePassword', 'LoginController@changePassword')->name('/trainer/changePassword');
});
/*Trainer Route END*/


/* Front Route START*/
Route::get('blog', 'Frontend\HomeController@blog')->name('blog');
Route::get('blog-details/{id}', 'Frontend\HomeController@blogDetails');

Route::group(['middleware' => 'login','namespace' => 'Frontend'], function () {
	Route::get('logout', 'LoginController@logout')->name('logout');
	Route::match(['GET', 'POST'], 'login', 'LoginController@index');
	Route::match(['GET', 'POST'], '/check-email', 'LoginController@checkEmail')->name('/check-email');
	Route::match(['GET', 'POST'], '/login-check', 'LoginController@loginCheck')->name('/login-check');
});

/* Front Route END*/
