<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::get('/dashboard/submitdoc', 'App\Http\Controllers\DocumentController@submitdoc')->name('dashboard.submitdoc');
    Route::put('/dashboard/myprofile', 'App\Http\Controllers\MyprofileController@update')->name('myprofile.update');
    Route::post('/dashboard/submitdoc', 'App\Http\Controllers\DocumentController@store')->name('dashboard/submitdoc');
    Route::get('/dashboard/showdocument', 'App\Http\Controllers\DocumentController@show')->name('dashboard/showdocument');
    //TO EDIT Files
    Route::get('/editdoc/{id}', 'App\Http\Controllers\DocumentController@edit')->name('/editdoc');
    //TO UPDATE Files
    Route::post('/update/{id}','App\Http\Controllers\DocumentController@update')->name('/updatedoc');
    //To DOWNLOAD files
    Route::get('/download/{file}', 'App\Http\Controllers\DocumentController@download')->name('/download');
    //To VIEW files
    Route::get('/view/{id}', 'App\Http\Controllers\DocumentController@view')->name('/view');
    //TO DELETE Document
    Route::get('/delete/{id}', 'App\Http\Controllers\DocumentController@delete')->name('/deletedoc');
});

// for users
/*Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/submitdoc', 'App\Http\Controllers\DashboardController@submitdoc')->name('dashboard.submitdoc');
}); */

// for administrators
Route::group(['middleware' => ['auth', 'role:administrator']], function() { 
    Route::get('/dashboard/adminprofile', 'App\Http\Controllers\DashboardController@adminprofile')->name('dashboard.adminprofile');
    Route::put('/dashboard/adminprofile', 'App\Http\Controllers\MyprofileController@update')->name('adminprofile.update');

});

    Route::get('/dashboard/showdocument', 'App\Http\Controllers\DocumentController@show')->name('dashboard/showdocument');
    //TO EDIT Files
    Route::get('/editdoc/{id}', 'App\Http\Controllers\DocumentController@edit')->name('/editdoc');
    //TO UPDATE Files
    Route::post('/update/{id}','App\Http\Controllers\DocumentController@update')->name('/updatedoc');
    //To DOWNLOAD files
    Route::get('/download/{file}', 'App\Http\Controllers\DocumentController@download')->name('/download');
    //To VIEW files
    Route::get('/view/{id}', 'App\Http\Controllers\DocumentController@view')->name('/view');
    //TO DELETE Document
    Route::get('/delete/{id}', 'App\Http\Controllers\DocumentController@delete')->name('/deletedoc');
    

require __DIR__.'/auth.php';
