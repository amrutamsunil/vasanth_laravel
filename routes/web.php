<?php

use Illuminate\Support\Facades\Route;
use App\Students;
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
Route::group(['prefix'=>'student','as'=>'student.'],function(){
    Route::post('login','Auth\StudentsAuthController@login')->name('login');
    Route::get('logout','Auth\StudentsAuthController@logout')->name('logout');
    Route::get('login_page','Auth\StudentsAuthController@login_page')->name('login_page');
    Route::get('dashboard','StudentsController@index')->name('dashboard');
Route::get('academic','StudentsController@academic')->name('academic');
Route::get('fees','StudentsController@fees')->name('fees');
Route::get('personal_info','StudentsController@personal_info')->name('personal_info');
Route::post('change_password','StudentsController@change_password')->name('change_password_form');
    Route::get('change_password','StudentsController@show_change_password')->name('change_password');

Route::get('test',"StudentsController@test")->name('test');
    Route::post('login','Auth\AdminAuthController@login')->name('login');
    Route::get('logout','Auth\AdminAuthController@logout')->name('logout');
    Route::get('login_page','Auth\AdminAuthController@login_page')->name('login_page');
    Route::get('dashboard','AdminController@index')->name('dashboard');
});
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){

});
Route::get('/test','testing@test')->name('test');
