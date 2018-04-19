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

use App\Http\Middleware\checkUserIsAdmin;

 Route::get('/', function () {

    return view('home');

 });

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/dashboard', function () {

        return view('standardUser');
        
    });

    Route::get('admin/dashboard', function () {

        return view('adminUser');
        
    })->middleware(checkUserIsAdmin::class);

    Route::get('viewAccomodation', function () {

        return view('viewAccomodation');
    
     });

     Route::get('applyAccomodation', function () {

        return view('applyAccomodation');
    
     });

     Route::get('searchAccomodation', function () {

        return view('searchAccomodation');
        
     });

     Route::get('test', function () {

        return view('test');
        
     });

     Route::resource('viewAccomodation', 'AccomodationController');

     Route::get('accomodation{accom}', 'AccomodationController@show');







