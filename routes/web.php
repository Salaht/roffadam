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
Route::get('/', 'PagesController@home');
Route::get('/post/{id}', 'PagesController@showPost');
Route::post('/post/{id}/comment', 'PostController@comment');

Route::get('/artist','PagesController@artist');
Route::get('/artist/{id}', 'PagesController@showArtist');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
   Route::get('/admin', 'PagesController@admin');
});

Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');


Route::group(['prefix' => 'admin'], function () {
	Route::resource('posts', 'PostController');
	Route::resource('artists', 'ArtistController');
});

Route::delete('delete/{id}',array('uses' => 'PostController@deleteComment', 'as' => 'comment.delete'));

Route::post('/search', 'PostController@search');
Route::post('/admin/posts/search', 'PostController@admin_search');

Route::post('/artist/search', 'ArtistController@search');
Route::post('/admin/artists/search', 'ArtistController@admin_search');