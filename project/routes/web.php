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

Route::get('/', 'PagesController@index');

Route::get('/regiedit', ['as' => 'register.edit', 'uses' => 'Auth\RegisterController@edit']);

Auth::routes();

Route::get('/about', 'PagesController@about');

Route::get('/faq', 'PagesController@faq');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/redirect', 'SocialAuthFacebookController@redirect');

Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::resource('posts', 'PostsController');

Route::get('/search', ['as' => 'posts.search', 'uses' => 'PostsController@search']);

Route::resource('bookings', 'BookingsController');

Route::resource('payment', 'PaymentController');

Route::resource('bank', 'BankController');

Route::resource('cc', 'CcController');

Route::get('/facebook', 'PagesController@facebook');

Route::get('/facebookPost/{post_id}', ['as' => 'fbPost', 'uses' => 'PagesController@facebookPost']);

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create/{recipient_id}/{post_id}', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});