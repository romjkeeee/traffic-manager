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
    return view('auth/login');
});

Route::get('/traffic', 'TrafficController@index');
Route::get('/deep', 'RawController@index');
Route::put('/deep', 'RawController@index');
Route::post('/deep', 'RawController@index');

Route::group(['middleware'=>'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/pages/application', 'ApplicationController');
    Route::get('/pages/application/{id}/copy', 'ApplicationController@copy')->name('app.copy');
    Route::resource('/pages/countries', 'CountriesController');
    Route::resource('/pages/offers', 'OffersController');
    Route::get('/pages/offers/{id}/copy', 'OffersController@copy')->name('offers.copy');
    Route::resource('/pages/deep_link', 'DeepLinkController');
    Route::resource('/pages/organisation', 'OrganisationController');
    Route::get('/export', 'DeepLinkController@export')->name('deep_link.export');
    Route::resource('/pages/users', 'UsersController');

















});

Auth::routes();



