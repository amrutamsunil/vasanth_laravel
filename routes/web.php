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

});
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::post('login','Auth\AdminAuthController@login')->name('login');
    Route::get('logout','Auth\AdminAuthController@logout')->name('logout');
    Route::get('login_page','Auth\AdminAuthController@login_page')->name('login_page');
    Route::get('dashboard','AdminController@index')->name('dashboard');
    Route::post('select_department','AdminController@select_department')->name('select_department');
    Route::get('new_registration','AdminController@new_registration')->name('new_registration');
    Route::get('change_password_page','AdminController@show_change_password')->name('show_change_password');
    Route::post('change_password','AdminController@change_password')->name('change_password');
    Route::post('select_class','AdminController@select_class')->name('select_class');
    Route::get('choose_department','AdminController@choose_department')->name('choose_department');
    Route::get('students','AdminController@show_students')->name('students');
    Route::post('student_edit','AdminController@student_edit')->name('student_edit');
    Route::get('delete_student/{student_id}','AdminController@delete_student')->name('delete_student');
    Route::get('student_profile/{student_id}','AdminController@student_profile')->name('student_profile');
    Route::get('add_new_student','AdminController@show_add_student')->name('show_add_student');
    Route::post('add_new_student','AdminController@add_student')->name('add_student');



});
