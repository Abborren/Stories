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

Route::get('/', 'StoriesController@create')->name('story.index');
Route::post('/story', 'StoriesController@store')->name('story.store');
Route::get('/success/{uuid}', 'StoriesController@success')->name('story.success');
Route::get('/story/{id_encrypted}', 'StoriesController@show')->name('story.show');

Route::get('/error', function() {
    return view('story.error');
});