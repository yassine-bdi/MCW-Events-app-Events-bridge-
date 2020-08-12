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

Route::redirect('/', '/event');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('session','SessionController'); 


Route::resource('event', 'EventController'); 
Route::post('/addsession/{event}','EventController@addsession')->name('addsession'); 

Route::resource('ticket', 'TicketController',)->only('store','show')->middleware('auth'); 

Route::post('ticket/{id}', 'TicketController@Reserve')->name('Reserver'); 


Route::resource('user','UserController')->only(['show'])->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
