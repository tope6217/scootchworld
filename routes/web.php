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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/')->group(function () {
    Route::get('/', 'indexController@index');
    Route::get('/category/news/{category}', 'indexController@categorynews');
    Route::get('/news/{topic}','indexController@news');
});
//user/dashboard/pay/
Route::middleware(['auth'])->prefix('user/dashboard')->group(function () {
    Route::get('/', 'admin\indexController@index')->name('dashboard');
    Route::resource('/news', 'admin\NewController');
    Route::resource('/category', 'admin\CategoryController');
    Route::resource('/section', 'admin\sectionController');
    Route::resource('/advert', 'advertController');

    Route::resource('/subscribtion', 'admin\subController');
    Route::get('/payment','paymentController@index')->name('payment');
    Route::get('/pay/{id}', 'paymentController@redirectToGateway')->name('makepayment');

    //Route::get('/new/news/{section}/', 'admin\NewController@news');
});
Route::prefix('user')->group(function () {
    Route::get('/register', 'user\indexController@register');
    Route::get('/login', 'user\indexController@login')->name('login');
    Route::post('/register', 'user\indexController@registeruser')->name('registeruser');
    Route::post('/login', 'user\indexController@loginuser')->name('loginuser');
});


//Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
