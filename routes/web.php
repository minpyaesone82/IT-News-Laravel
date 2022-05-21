<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/','BlogController@index')->name('index');
Route::get('detail/{slug}','BlogController@detail')->name('detail');
Route::get('baseOnCategory/{id}','BlogController@baseOnCategory')->name('baseOnCategory');
Route::get('baseOnUser/{id}','BlogController@baseOnUser')->name('baseOnUser');
Auth::routes();


Route::prefix('admin')->middleware("auth")->group(function(){
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('photo', 'PhotoController');
    Route::get("edit-photo","ProfileController@editPhoto")->name("profile.editPhoto");
    Route::post("change-photo","ProfileController@changePhoto")->name("profile.changePhoto");
    Route::get("changePassword","ProfileController@changePassword")->name("profile.changePassword");
    Route::post("change-password","ProfileController@changePass")->name("profile.changePass");
    Route::get("profile","ProfileController@profile")->name("profile.yourProfile");
    Route::get("email","ProfileController@email")->name("profile.email");
    Route::get("profile","ProfileController@profile")->name("profile.yourProfile");
    Route::get("email","ProfileController@email")->name("profile.email");
    Route::post("emailChange","ProfileController@emailChange")->name("profile.emailChange");
    Route::post('updateInfo',"ProfileController@updateInfo")->name("profile.updateInfo");
});



