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

Route::get('/home', function () {
    return view('home');
});

Route::namespace('\App\Http\Controllers')->group(function(){
    Route::resource('/album', 'AlbumController');
    Route::post('/gallery' , 'AlbumController@storeImages')->name('gallery.store');
    Route::get('/gallery/{id}' , 'AlbumController@deleteImage')->name('gallery.delete');
    Route::put('/gallery' , 'AlbumController@move')->name('gallery.move');
    Route::get('/Gallery' , 'AlbumController@gallery')->name('gallery.all');

});




