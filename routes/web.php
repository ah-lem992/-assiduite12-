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


    //route pour les groupes
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
    //many to many essay
    Route::get('/prof-associe', 'Admin\AssocieController@associe');
    Route::post('/prof-save', 'Admin\AssocieController@store');


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
    //pour lesson
    Route::get('/seance', 'Admin\SeanceController@index');
    Route::get('/seance/create', 'Admin\SeanceController@create');
    Route::post('/seance', 'Admin\SeanceController@store');
    Route::get('/seance/{id}', 'Admin\SeanceController@edit');
    Route::put('/seance/{id}', 'Admin\SeanceController@update');
    Route::get('seance-delete/{id}', 'Admin\SeanceController@destroy');

    //route pour l'etudiant
    Route::get('/etudiant', 'Admin\EtudiantController@index');
    Route::get('/etudiant/create', 'Admin\EtudiantController@create');
    Route::post('/etudiant', 'Admin\EtudiantController@store');
    Route::get('/etudiant/{etud_id}', 'Admin\EtudiantController@edit');
    Route::put('/etudiant/{etud_id}', 'Admin\EtudiantController@update');
    Route::get('etudiant-delete/{etud_id}', 'Admin\EtudiantController@destroy');

    //route pour presence
    Route::get('/presence', 'Admin\PresenceController@index');
    Route::get('/presence/create', 'Admin\PresenceController@create');
    Route::post('/presence', 'Admin\PresenceController@store');
    Route::get('/presence/{presence_id}', 'Admin\PresenceController@edit');
    Route::put('/presence/{presence_id}', 'Admin\PresenceController@update');
    Route::get('/presence-delete/{presence_id}', 'Admin\PresenceController@destroy');
});

Route::group(['middleware' => ['auth', 'prof']], function () {



    Route::get('/hello', function () {
        return view('profeseur.hello');
    });

    //Route::get('/etudiants', 'Prof\ProfController@index');

    //route pour presences c'etait presences
    Route::get('/profs/presences', 'Prof\PresenceController@index');
    Route::get('/profs/presences/create', 'Prof\PresenceController@create');
    Route::post('/profs/presences', 'Prof\PresenceController@store');
    Route::get('/profs/presences/{presence_id}', 'Prof\PresenceController@edit');
    Route::put('/profs/presences/{presence_id}', 'Prof\PresenceController@update');
    Route::get('/profs/presences-delete/{presence_id}', 'Prof\PresenceController@destroy');
});
