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

//use App\Task;

// App::singleton('App\Billing\Stripe', function() {
//     return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

//$stripe = App::make('App\Billing\Stripe');
//$stripe =resolve('App\Billing\Stripe');
//$stripe =app('App\Billing\Stripe');

//dd($stripe);

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');


Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');
