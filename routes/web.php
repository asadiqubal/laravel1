<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');





Route::group(['prefix' => 'admin'], function() {
	Route::get('/changePassword','App\Http\Controllers\AdminController@showChangePasswordForm');
Route::post('/changePassword','App\Http\Controllers\AdminController@changePassword')->name('changePassword');


	Route::get('/dashboard', 'App\Http\Controllers\AdminController@index')->name('dashboard');
	Route::get('/deleteByID/{model}/{id}','App\Http\Controllers\AdminController@deleteByID');
	
	Route::get('/staff-list','App\Http\Controllers\AdminController@staffList');
	Route::get('/add-staff','App\Http\Controllers\AdminController@addStaff');
	Route::get('/edit-staff/{id}','App\Http\Controllers\AdminController@editStaff');
	Route::post('/submitaddStaff','App\Http\Controllers\AdminController@submitaddStaff')->name('submitaddStaff');
	
	
	Route::get('/schedule','App\Http\Controllers\AdminController@schedule');
	Route::get('/add-schedule','App\Http\Controllers\AdminController@addSchedule');
	Route::get('/edit-schedule/{id}','App\Http\Controllers\AdminController@editsSchedule');
	Route::post('/submitaddSchedule','App\Http\Controllers\AdminController@submitaddSchedule')->name('submitaddSchedule');
	
	
	
	Route::get('/marketing','App\Http\Controllers\AdminController@marketing');
	
	
	
	Route::get('/add-marketing','App\Http\Controllers\AdminController@addMarketing');
	Route::get('/edit-marketing/{id}','App\Http\Controllers\AdminController@editMarketing');
	
	Route::get('/client-list','App\Http\Controllers\AdminController@clientList');
	Route::get('/add-client','App\Http\Controllers\AdminController@addClient');
	Route::get('/edit-client/{id}','App\Http\Controllers\AdminController@editClient');
	Route::post('/submitaddClient','App\Http\Controllers\AdminController@submitaddClient')->name('submitaddClient');
	Route::post('/submitaddMarketing','App\Http\Controllers\AdminController@submitaddMarketing')->name('submitaddMarketing');
	
	Route::get('/timesheet','App\Http\Controllers\AdminController@timesheet');
	Route::get('/add-timesheet','App\Http\Controllers\AdminController@addTimesheet');
	Route::get('/edit-timesheet/{id}','App\Http\Controllers\AdminController@editTimesheet');
	Route::post('/submitaddTimesheet','App\Http\Controllers\AdminController@submitaddTimesheet')->name('submitaddTimesheet');

});


Route::group(['prefix' => 'staff'], function() {
	Route::get('/changePassword','App\Http\Controllers\StaffController@showChangePasswordForm');
Route::post('/changePassword','App\Http\Controllers\StaffController@changePassword')->name('changePassword');

	Route::get('/registration/{id}', 'App\Http\Controllers\StaffController@registration')->name('registration');
	Route::post('/templogin', 'App\Http\Controllers\StaffController@templogin')->name('templogin');
	Route::get('/set-password/{id}', 'App\Http\Controllers\StaffController@setpassword')->name('set-password');
	Route::get('/link-expired', 'App\Http\Controllers\StaffController@linkExired')->name('link-expired');
	Route::post('/submitpassword', 'App\Http\Controllers\StaffController@submitpassword')->name('submitpassword');
	
	Route::get('/dashboard', 'App\Http\Controllers\StaffController@index')->name('dashboard');
	Route::get('/past-visit', 'App\Http\Controllers\StaffController@pastVisit')->name('past-visit');
	Route::get('/today-schedule', 'App\Http\Controllers\StaffController@todaySchedule')->name('today-schedule');
	Route::get('/timesheet', 'App\Http\Controllers\StaffController@timeSheet')->name('timesheet');
	Route::get('/deleteByID/{model}/{id}','App\Http\Controllers\StaffController@deleteByID');
	Route::get('/change-status/{id}/{status}','App\Http\Controllers\StaffController@changeStatus');
	
	
	Route::post('/submitNotesForm', 'App\Http\Controllers\StaffController@submitNotesForm')->name('submitNotesForm');

});
Route::group(['prefix' => 'client'], function() {
	Route::get('/changePassword','App\Http\Controllers\ClientController@showChangePasswordForm');
Route::post('/changePassword','App\Http\Controllers\ClientController@changePassword')->name('changePassword');

	Route::get('/registration/{id}', 'App\Http\Controllers\ClientController@registration')->name('registration');
	Route::post('/templogin', 'App\Http\Controllers\ClientController@templogin')->name('templogin');
	Route::get('/set-password/{id}', 'App\Http\Controllers\ClientController@setpassword')->name('set-password');
	Route::get('/link-expired', 'App\Http\Controllers\ClientController@linkExired')->name('link-expired');
	Route::post('/submitpassword', 'App\Http\Controllers\ClientController@submitpassword')->name('submitpassword');
	
	Route::get('/dashboard', 'App\Http\Controllers\ClientController@index')->name('dashboard');
	Route::get('/past-visit', 'App\Http\Controllers\ClientController@pastVisit')->name('past-visit');
	Route::get('/today-schedule', 'App\Http\Controllers\ClientController@todaySchedule')->name('today-schedule');

	Route::get('/deleteByID/{model}/{id}','App\Http\Controllers\ClientController@deleteByID');
	
	Route::post('/submitNotesForm', 'App\Http\Controllers\ClientController@submitNotesForm')->name('submitNotesForm');
});
