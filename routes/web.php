<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by r within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','AdminController@index')->name('admin')->middleware('admin');
Route::get('/user','UserController@index')->name('user')->middleware('user');
Route::get('/role-register','DashboardController@display');
Route::get('/sendnotification','NewNotificationController@notificationonly')->name('sendnotification');
Route::get('/shownotificationinuser','show@shownotification');

Route::get('ReadNotification/{id}','MarkSingleNotification@ReadNotification')->name('ReadNotification');

Route::get('markAsRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	return redirect()->back();
})->name('markRead');

