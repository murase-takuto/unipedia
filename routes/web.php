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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('prefectures', 'RegisterSchoolController@selectPref')->name('select.pref');
Route::get('schools', 'RegisterSchoolController@selectUniversity')->name('select.university');
Route::get('fuculties', 'RegisterSchoolController@selectFuculty')->name('select.fuculty');
Route::get('classes', 'RegisterSchoolController@selectClass')->name('select.class');
Route::get('home', 'HomeController@index')->name('home');
