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
    if (Auth::check()) {
        return redirect()->route('schedules.index');
    }    
    return view('welcome');
});

Auth::routes();

//Route::get('/', 'Student\ScheduleController@index');

//学生新規登録
Route::group(['namespace' => 'Student',], function() {
    Route::get('prefectures', 'RegisterSchoolController@selectPref')->name('select.pref');
    Route::get('schools', 'RegisterSchoolController@selectUniversity')->name('select.university');
    Route::get('fuculties', 'RegisterSchoolController@selectFuculty')->name('select.fuculty');
    Route::get('classes', 'RegisterSchoolController@selectClass')->name('select.class');
});
//チュートリアル
Route::get('/Student/tutorial', function () {
    return view('tutorial');
});

//学生時間割RESTful
Route::group(['namespace' => 'Student', 'middleware' => 'auth'], function() {
    Route::get('schedules/{id}/class/{class_id}', 'ScheduleController@show');
    Route::resource('schedules', 'ScheduleController', ['except' => ['show']]);
    Route::resource('threads', 'ThreadController');
    Route::resource('universityposts', 'UniversityPostController');
    Route::resource('class', 'ClassController', ['only' => ['show', 'update', 'store', 'destroy']]);
    Route::resource('profile', 'ProfileController', ['only' => ['index', 'create', 'store']]);
    Route::get('email/{token}', 'ProfileController@authorizeEmail')->name('profile.authorize');
});

Route::resource('questions', 'QuestionController', ['only' => ['index']]);
