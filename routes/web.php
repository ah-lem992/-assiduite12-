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
    /*pour les prof
    Route::get('/prof', 'Admin\ProfController@index');
    Route::get('/prof/create', 'Admin\ProfController@create');
    Route::post('/prof', 'Admin\ProfController@store');
    */
    //route pour les groupe
    Route::get('/groupe', 'Admin\GroupeController@index');
    Route::get('/search_groupe', 'Admin\GroupeController@search')->name('search');
    Route::get('/groupe/create', 'Admin\GroupeController@create');
    Route::post('/groupe', 'Admin\GroupeController@store');
    Route::get('/groupe/{groupe_id}', 'Admin\GroupeController@edit');
    Route::put('/groupe/{groupe_id}', 'Admin\GroupeController@update');
    Route::get('groupe-delete/{groupe_id}', 'Admin\GroupeController@destroy');

    //routes pour les prof
    Route::get('/prof', 'Admin\ProfController@index');
    Route::get('/prof_search', 'Admin\ProfController@search')->name('search');
    Route::get('/prof/create', 'Admin\ProfController@create');
    Route::post('/prof', 'Admin\ProfController@store');
    Route::get('/prof/{prof_id}', 'Admin\ProfController@edit');
    Route::put('/prof/{prof_id}', 'Admin\ProfController@update');
    Route::get('prof-delete/{prof_id}', 'Admin\ProfController@destroy');

    //route pour les cours
    Route::get('/cour', 'Admin\CourController@index');
    Route::get('/cour_search', 'Admin\CourController@search')->name('search');
    Route::get('/cour/create', 'Admin\CourController@create');
    Route::post('/cour', 'Admin\CourController@store');
    Route::get('/cour/{cour_id}', 'Admin\CourController@edit');
    Route::put('/cour/{cour_id}', 'Admin\CourController@update');
    Route::get('cour-delete/{cour_id}', 'Admin\CourController@destroy');

    //route pour les salles
    Route::get('/salle', 'Admin\SalleController@index');
    Route::get('/salle_search', 'Admin\SalleController@search')->name('search');
    Route::get('/salle/create', 'Admin\SalleController@create');
    Route::post('/salle', 'Admin\SalleController@store');
    Route::get('/salle/{salle_id}', 'Admin\SalleController@edit');
    Route::put('/salle/{salle_id}', 'Admin\SalleController@update');
    Route::get('salle-delete/{salle_id}', 'Admin\SalleController@destroy');


});
