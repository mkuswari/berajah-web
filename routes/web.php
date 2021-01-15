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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// global routes
Route::get('/', 'PageController@index');
Route::get('/kelas', 'PageController@courseCatalogs')->name('kelas');
Route::get('/kelas/detail/{slug}', 'PageController@courseDetail')->name('kelas/detail');
Route::get('/kategori', 'PageController@categoryCatalogs')->name('kategori');
Route::get('/kategori/detail/{category}', 'PageController@categoryDetail')->name('kategori/detail');
Route::get('/blog', 'PageController@blogCatalogs')->name('blog');

// routes for member
Route::group(['prefix' => 'member'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

// routes for admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/instructors', 'InstructorController');
    Route::resource('/courses', 'CourseController');
});