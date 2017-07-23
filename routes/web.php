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
})->name('home');

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createpost', [
    'uses' => 'PostController@createPost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);

Route::get('/logout', [
    'uses' => 'UserController@logOut',
    'as' => 'logout'
]);

Route::get('/post-delete/{post_id}', [
    'uses' => 'PostController@deletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'
]);

Route::post('/edit', [
    'uses' => 'PostController@editPost',
    'as' => 'edit'
]);


Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account'
]);

Route::post('/updateAccount', [
    'uses' => 'UserController@saveAccount',
    'as' => 'account.save'
]);

Route::get('/getimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.image'
]);