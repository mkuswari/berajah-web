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

Auth::routes();

// global routes
Route::get('/', 'PageController@index');
Route::get('/kelas', 'PageController@courseCatalogs')->name('kelas');
Route::get('/kelas/detail/{slug}/{id}', 'PageController@courseDetail')->name('kelas/detail');
Route::get('/kategori', 'PageController@categoryCatalogs')->name('kategori');
Route::get('/kategori/detail/{category}', 'PageController@categoryDetail')->name('kategori/detail');
Route::get('/blog', 'PageController@blogCatalogs')->name('blog');

// routes for member
Route::group(['prefix' => 'member'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

// routes for admin
Route::group(['prefix' => 'admin'], function () {
    // dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // user management
    Route::resource('/users', 'UserController');
    // categories management
    Route::resource('/categories', 'CategoryController');
    // instructors management
    Route::resource('/instructors', 'InstructorController');
    // courses management
    Route::resource('/courses', 'CourseController');
    // content management
    Route::get('/courses/{course}/add-content', 'ContentController@addContent')->name('courses.add-content');
    Route::post('/courses/store-content', 'ContentController@storeContent')->name('courses.store-content');
    Route::get('/courses/{course_id}/content/{id}/edit-content', 'ContentController@editContent')->name('courses.edit-content');
    Route::put('/courses/{id}/update-content', 'ContentController@updateContent')->name('courses.update-content');
    Route::delete('/courses/{course_id}/content/{id}/delete-content', 'ContentController@deleteContent')->name('courses.delete-content');
    // enrollments routes
    Route::resource('/enrolls', 'EnrollmentController');
});
