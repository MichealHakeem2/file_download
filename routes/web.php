<?php

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

Route::get('/', function () {
    return view('welcome');
});
// indexs
Route::get("/emps", "EmployeeController@index")->name("employee.index");
Route::get("/file", "FileController@index")->name("file.index");
// show
Route::get("/emps/show/{id}", "EmployeeController@show")->name("employee.show");
Route::get("/file/show/{id}", "FileController@show")->name("file.show");
// create
Route::get("/emps/create", "EmployeeController@create")->name("employee.create");
Route::get("/file/create", "FileController@create")->name("file.create");
// store
Route::post("/emps/store", "EmployeeController@store")->name("employee.store");
Route::post("/file/store", "FileController@store")->name("file.store");
// delete
Route::get("/emps/delete/{id}", "EmployeeController@destroy")->name("employee.destroy");
Route::get("/file/delete/{id}", "FileController@destroy")->name("file.destroy");
// edit
Route::get("/emps/edit/{id}", "EmployeeController@edit")->name("employee.edit");
Route::get("/file/edit/{id}", "FileController@edit")->name("file.edit");
// update
Route::post("/emps/update/{id}", "EmployeeController@update")->name("employee.update");
Route::post("/file/update/{id}", "FileController@update")->name("file.update");
// Download
Route::get("/file/download/{id}", 'FileController@download')->name("file.download");



