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

use App\Promo;
//use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

// to change the role  usertype middleware go to logincontroller , adminmiddleware ,
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/role-register', 'Admin\DashboardController@registered');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');
    Route::put('/role-register-update/{id}', 'Admin\DashboardController@registerupdate');
    Route::get('/role-delete/{id}', 'Admin\DashboardController@registerdelete');
    #route pour promo

    Route::get('/promo', 'Admin\PromoController@index');
    Route::get('/search', 'Admin\PromoController@search')->name('search');
    Route::get('/promo/create', 'Admin\PromoController@create');
    Route::post('/promo', 'Admin\PromoController@store');
    Route::get('/promo/{id}', 'Admin\PromoController@edit');
    Route::put('/promo/{id}', 'Admin\PromoController@update');
    Route::get('promo-delete/{id}', 'Admin\PromoController@destroy');
    //pour les prof
    Route::get('/prof', 'Admin\ProfController@index');
    Route::get('/prof/create', 'Admin\ProfController@create');
    Route::post('/prof', 'Admin\ProfController@store');
});
