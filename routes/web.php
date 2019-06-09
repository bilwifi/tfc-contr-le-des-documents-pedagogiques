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


Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/*|||||||||||||||||||||||||||||||||||||
|
|  Routes pour l'admin
|
|||||||||||||||||||||||||||||||||||||*/
Route::prefix('admin')->group(function(){
	Route::name('admin.')->group(function () {
		// Professeur
		Route::get('/', 'Admin\DashboardController@index')->name('index');
		Route::get('/liste-professeur', 'Admin\DashboardController@getListProf')->name('get_prof');
		Route::post('/gestion_profs', 'Admin\DashboardController@storeProf')->name('store_prof');
		// Contrôle
		Route::post('/redirect_new_controle', 'Admin\DashboardController@redirectNewControle')->name('redirect_new_controle');
		Route::get('/new_controle/{professeurs}', 'Admin\DashboardController@newControle')->name('new_controle');
		Route::post('/new_controle_document', 'Admin\DashboardController@newControleDocument')->name('new_controle_document');
		// Affichage controlr
		Route::get('/get_controle/{controle}', 'Admin\DashboardController@getControle')->name('get_controle');

		// Route::resource('/gestion_profs', 'Admin\DashboardController@')->only(['store']);

		


	});
});

/*|||||||||||||||||||||||||||||||||||||
|
|  Routes pour le professeur
|
|||||||||||||||||||||||||||||||||||||*/
Route::prefix('professeur')->group(function(){
	Route::name('professeur.')->group(function () {
		Route::get('/', 'Professeurs\DashboardController@index')->name('index');
		Route::get('/get_controle/{controle}', 'Professeurs\DashboardController@getControle')->name('get_controle');
		


	});
});
