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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/crudIndex', 'HomeController@crudIndex');
Route::post('/crudMaker', 'HomeController@crudMaker');
 
Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('admin/posts', 'Admin\\PostsController');
Route::resource('admin/asik', 'Admin\\AsikController');
Route::resource('admin/sagor', 'Admin\\SagorController');
Route::resource('admin/employee', 'Admin\\EmployeeController');
Route::resource('admin/test', 'Admin\\testController');