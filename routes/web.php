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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
//Route::get('/dashboard', 'DashboardController@index');


Route::get('/home', 'HomeController@index')->name('home');

//Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
//usermangement
Route::get('user-management/index', 'UserManagementController@index')->name('users-mgmt.index');
Route::resource('user-management', 'UserManagementController');
//taxon
//Route::get('taxons/index', 'TaxonController@index')->name('taxons.index');
Route::resource('taxons','TaxonController');
Route::get('iucns/index', 'IucnThreatCodeController@index')->name('iucns.index');
Route::resource('iucns', 'IucnThreatCodeController');
Route::get('nationals/index', 'NationalThreatCodeController@index')->name('nationals.index');
Route::resource('nationals', 'NationalThreatCodeController');
//ranges
Route::get('ranges/index', 'RangeController@index')->name('ranges.index');
Route::resource('ranges', 'RangeController');
//growth
Route::get('growth/index', 'GrowthController@index')->name('growth.index');
Route::resource('growth', 'GrowthController');
//protected-area
Route::get('protected-area/index', 'ProtectedAreaController@index')->name('protected-area.index');
Route::resource('protected-area', 'ProtectedAreaController');
//countries
Route::get('country/index', 'CountryController@index')->name('country.index');
Route::resource('country', 'CountryController');
//forest
Route::get('forest/index', 'ForestController@index')->name('forest.index');
Route::resource('forest', 'ForestController');
//water
Route::get('water/index', 'WaterController@index')->name('water.index');
Route::resource('water', 'WaterController');
//Endenism
Route::get('endenism/index', 'EndenismController@index')->name('endenism.index');
Route::resource('endenism', 'EndenismController');
//Admin Unit
Route::get('admin-unit/index', 'AdminUnitController@index')->name('admin-unit.index');
Route::resource('admin-unit', 'AdminUnitController');
//Migration
Route::get('migration/index', 'MigrationController@index')->name('migration.index');
Route::resource('migration', 'MigrationController');
//api
Route::get('apilist/index', 'ApibaseController@index')->name('Apibase.index');
Route::resource('apilist','ApibaseController');
//method
Route::resource('method','MethodController');
//observation
Route::resource('observation','ObservationController');
//age
Route::resource('age','AgeController');
//Abundance
Route::resource('abundance','AbundanceController');
//Observer
Route::resource('observer','ObserverController');






