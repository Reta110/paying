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
    return view('welcome');
});

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::resource('users', 'UserController');



Route::resource('activities', 'ActivitiesController');

Route::resource('activityTypes', 'ActivityTypeController');

Route::resource('locations', 'LocationController');

Route::resource('works', 'WorkController');
Route::post('massive_works', 'WorkController@insert')->name('works.insert');

Route::get('generator', 'GeneratorController@index')->name('generator.index');
Route::post('invoice', 'GeneratorController@invoice')->name('generator.invoice');
