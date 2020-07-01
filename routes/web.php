<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')
    ->name('home');

Route::resource('systems', 'SystemController')
    ->middleware('auth')
    ->except('show');

Route::resource('clients', 'ClientController')
    ->middleware('auth');

Route::resource('services', 'ServiceController')
    ->middleware('auth');

Route::resource('licenses', 'LicenseController')
    ->middleware('auth');

Route::resource('users', 'UserController')
    ->middleware('auth');

Route::get('search', function () {
    $query = 'juan'; // <-- Change the query for testing.

    $articles = App\License::search($query)->get();

    return $articles;
});
