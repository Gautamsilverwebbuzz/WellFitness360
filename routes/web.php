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
	

	
	Route::get('admin/user-trainer-activity', 'DashboardController@UserandTrainerActivity')->name('admin/user-trainer-activity');
	Route::post('admin/save-user-trainer-activity', 'DashboardController@saveUserandTrainerActivity')->name('admin/save-user-trainer-activity');

	//Module management
	Route::get('/module/delete/{id}', 'ModulesController@destroy');
	Route::resource('module', 'ModulesController');

	// Roles & Permission Module
	Route::get('/rolepermission/delete/{id}', 'ModulesController@destroy');
	Route::resource('rolepermission', 'RolesPermissionController');

	// Trainer Management
	Route::get('admin/trainerManagement/delete/{id}', 'TrainerController@destroy');
	Route::get('admin/trainerManagement/apporved/{id}', 'TrainerController@apporved');
	Route::resource('admin/trainerManagement', 'TrainerController');

	// User Management
	Route::get('admin/UserManagement/delete/{id}', 'UserController@destroy');
	Route::match(['GET', 'POST'], 'admin/check-email-register', 'UserController@EmailCheckRegister')->name('emailregister');
	Route::resource('admin/UserManagement', 'UserController');

	// Trainer Categories Management
	Route::get('admin/trainercategoriesManagement/edit/{id}', 'TrainerCategoriesController@edit');
	Route::post('admin/trainercategoriesManagement/update/{id}', 'TrainerCategoriesController@update')->name('admin/trainercategoriesManagement.update');
	Route::get('admin/trainercategoriesManagement/delete/{id}', 'TrainerCategoriesController@destroy');
	Route::resource('admin/trainercategoriesManagement', 'TrainerCategoriesController');

	// Categories Management
	Route::get('admin/categoriesManagement/delete/{id}', 'CategoriesController@destroy');
	Route::resource('admin/categoriesManagement', 'CategoriesController');

	// Sub Categories Management
	Route::get('admin/subcategoriesManagement/delete/{id}', 'SubCategoriesController@destroy');
	Route::resource('admin/subcategoriesManagement', 'SubCategoriesController');

	// Event Management
	Route::get('admin/eventManagement/delete/{id}', 'EventController@destroy');
	Route::resource('admin/eventManagement', 'EventController');

	// Subscription Management
	Route::get('admin/SubscriptionPlanManagement/delete/{id}', 'SubscriptionPlanController@destroy');
	Route::resource('admin/SubscriptionPlanManagement', 'SubscriptionPlanController');
	
	// Blog Management
	Route::get('admin/blogManagement/delete/{id}', 'BlogController@destroy');
	Route::resource('admin/blogManagement', 'BlogController');

	// CMS-Pages Managment
	Route::match(['GET', 'POST'], 'admin/cms_aboutus', 'CMSPagesController@aboutUs')->name('admin/cms_aboutus');
	Route::match(['GET', 'POST'], 'admin/cms_contactus', 'CMSPagesController@contactus')->name('admin/cms_contactus');

	// Site Setting
	Route::get('admin/setting', 'SettingController@siteSetting')->name('admin/setting');
	Route::put('admin/setting/update', 'SettingController@update')->name('admin/settingUpdate');

	// E-shop Management
	Route::get('admin/E_shopManagement/delete/{id}', 'EshopController@destroy');
	Route::resource('admin/E_shopManagement', 'EshopController');

	// Fees Management
	Route::get('admin/FeesManagement/delete/{id}', 'FeesController@destroy');
	Route::resource('admin/FeesManagement', 'FeesController');

});

/* Front Route START*/
Route::get('blog', 'Frontend\HomeController@blog')->name('blog');
Route::get('blog-details/{id}', 'Frontend\HomeController@blogDetails');
Route::match(['GET', 'POST'], 'user/register', 'Frontend\RegisterController@userregister')->name('user/register');
Route::match(['GET', 'POST'], 'user/registerUser', 'Frontend\RegisterController@registerUser')->name('user/registerUser');
Route::match(['GET', 'POST'], 'trainer/register', 'Frontend\RegisterController@trainerRegister')->name('trainer/register');
Route::match(['GET', 'POST'], 'physique', 'Frontend\RegisterController@Physique')->name('physique');

Route::get('logout', 'LoginController@logout')->name('logout');
Route::match(['GET', 'POST'], 'login', 'LoginController@index');
Route::match(['GET', 'POST'], '/check-email', 'LoginController@checkEmail')->name('/check-email');
Route::match(['GET', 'POST'], '/login-check', 'LoginController@loginCheck')->name('/login-check');
Route::match(['GET', 'POST'], '/forgetPassword', 'ForgotPasswordController@forgetPassword')->name('/forgetPassword');
Route::match(['GET', 'POST'], '/resetPassword', 'ForgotPasswordController@resetPassword')->name('/resetPassword');

Route::group(['middleware' => 'login','namespace' => 'Frontend','namespace' => 'Trainer'], function () {
	/*Trainer */
	Route::get('/trainer/dashboard', 'DashboardController@index')->name('/trainer/dashboard');
	Route::match(['GET', 'POST'], '/trainer/changePassword', 'DashboardController@changePassword')->name('/trainer/changePassword');
	Route::match(['GET', 'POST'], '/trainer/profile', 'DashboardController@trainerProfile')->name('/trainer/profile');
	Route::match(['GET', 'POST'], 'trainer/setting', 'SettingController@trainerSetting')->name('trainer/setting');
	Route::match(['GET', 'POST'], 'trainer/setting/update', 'SettingController@update')->name('trainer/setting/update');
	/*Trainer*/
});

/* Front Route END*/