<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

//Route::get('login',function (){
//   return view('back_end.auth.login');
//});

Route::get('system-admin','AdminController@showLoginFrom')->name('admin.login');
Route::post('system-admin','AdminController@processLoginFrom');

Route::get('/','DashboardController@showDashboard')->name('dashboard');

// Category section routes
Route::get('category','CategoryController@showCategoryForm')->name('category');
Route::post('category','CategoryController@processCategoryForm');

Route::get('categories','CategoryController@showAllCategory')->name('categories');

// Sub category section routes
Route::get('sub-category','SubCategoryController@showSubCategoryForm')->name('sub.category');
Route::post('sub-category','SubCategoryController@processSubCategoryForm');

// Package routes
Route::get('package','PackageController@showPackageForm')->name('package');
Route::post('package','PackageController@processPackageForm');

Route::get('packages','PackageController@showAllPackages')->name('packages');

// Package Schedules routes
Route::get('schedule','ScheduleController@showScheduleForm')->name('schedule');
Route::post('schedule','ScheduleController@processScheduleForm');

Route::post('schedules','ScheduleController@showAllSchedule')->name('schedules');











