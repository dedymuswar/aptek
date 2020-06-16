<?php

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
use Spatie\Permission\Models\Role;
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/role', function () {
    auth()->user()->assignRole('admin');
});
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'HomeController@index')->name('home');
Route::get('gillies', 'HomeController@gillies')->name('gillies');
Route::get('doughlas', 'HomeController@doughlas')->name('doughlas');
Route::get('ilyas', 'HomeController@ilyas')->name('ilyas');
Route::get('ppni', 'HomeController@ppni')->name('ppni');

Route::get('depkes/ruangan-rawat', 'HomeController@depkesrrawat')->name('depkes.rrawat');
Route::get('depkes/kamar-ok', 'HomeController@depkeskamarok')->name('depkes.kamarok');
Route::get('depkes/ugd', 'HomeController@depkesugd')->name('depkes.ugd');
Route::get('depkes/rawatjalan', 'HomeController@depkesrj')->name('depkes.rj');
