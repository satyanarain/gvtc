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
Route::get('guest_register/find_username/{username}','GuestRegisterController@checkDuplicateUser');
Route::resource('guest_register','GuestRegisterController');
Route::resource('create_password','GuestPasswordController');
Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
//Route::get('/dashboard', 'DashboardController@index');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-management/user_status_update/{id}', 'UserManagementController@userstatusUpdate');
Route::get('user-management/guestedit', 'UserManagementController@guestedit')->name('user-management.guestedit');
Route::get('/user-management/viewprofile/{id}', 'UserManagementController@viewprofile');
Route::get('/user-management/unauthorized', 'UserManagementController@unauthorized')->name('user-management.unauthorized');
Route::resource('user-management', 'UserManagementController');

//taxon
//Route::get('taxons/{id}', 'TaxonController@statusUpdate');
 Route::get('taxons/status_update/{id}','TaxonController@statusUpdate');
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
Route::get('/protectecarea/protected_area/{id}', 'ProtectedAreaController@protectecarea');
Route::resource('protected-area', 'ProtectedAreaController');
Route::get('protected-area/index', 'ProtectedAreaController@index')->name('protected-area.index');

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
Route::get('/admin-unit/admin_unit/{id}', 'AdminUnitController@adminunit');
Route::resource('admin-unit', 'AdminUnitController');
Route::get('admin-unit/index', 'AdminUnitController@index')->name('admin-unit.index');

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
//specie
Route::resource('species','SpeciesController');
//gazetteer
Route::resource('gazetteer','GazetteerController');
//report
Route::resource('report','ReportController');
//
Route::get('/distribution/speciec_record/{id}', 'DistributionController@speciecRecord');
Route::resource('distribution','DistributionController');

//changepassword
Route::post('changepasswords/update', 'ChangepasswordsController@updatePassword');
Route::resource('changepasswords', 'ChangepasswordsController');

//GuestRegisterController
Route::resource('breeding','BreedingController');


//PermissionController
Route::get('/permission/generate/{id}','PermissionController@generate')->name('permission.generate');
Route::post('/permission/save','PermissionController@generatesave')->name('permission.generatesave');
Route::resource('permission','PermissionController');
//Route::get('/permission/create/{id}','PermissionController');


//GuestRegisterController

//Route::get('offlinerecord/bulksave', 'OfflineController@bulkSave')->name('offlinerecord.bulksave');
Route::post('/offlinerecord/bulk/', 'OfflineController@bulk')->name('offlinerecord.bulk');
Route::resource('offlinerecord','OfflineController');







