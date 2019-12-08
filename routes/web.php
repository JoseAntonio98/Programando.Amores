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
Route::get('/all_users', 'UsersController@getallusers')->name('all_users');
Route::get('/contacts','ContactsController@get');
Route::get('/conversation/{id}','ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
Route::get('/friends/{id}','FriendsController@relation');
Route::get('/request','FriendsController@request');
Route::get('/friends/to_accept/{id}','FriendsController@to_accept')->name('friends.to_acept');;

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'usersController');
Route::resource('users', 'usersController');
Route::resource('users', 'usersController');
Route::resource('friends', 'friendsController');
Route::resource('messages', 'messagesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
