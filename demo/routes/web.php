<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware gr00oup. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register','UsersController@register')->name('register');

Route::post('/users', 'UsersController@store')->name('users.store');
Route::get('/users', 'UsersController@show')->name('users.show');


Route::get('login','SessionsController@login')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('/active','UsersController@active')->name('active');

Route::post('userview', 'InfoController@userview')->name('userview');
Route::post('infonew', 'InfoController@infonew')->name('infonew');
Route::post('infoinsert', 'InfoController@infoinsert')->name('infoinsert');
Route::post('infoedit', 'InfoController@infoedit')->name('infoedit');
Route::any('infodetail', 'InfoController@infodetail')->name('infodetail');
Route::any('infoview', 'InfoController@infoview')->name('infoview');
Route::post('infoupdate', 'InfoController@infoupdate')->name('infoupdate');
Route::post('infodelete', 'InfoController@infodelete')->name('infodelete');

Route::any('articleview', 'ArticleController@articleview')->name('articleview');
Route::any('articledetail', 'ArticleController@articledetail')->name('articledetail');
Route::post('articlenew', 'ArticleController@articlenew')->name('articlenew');
Route::post('articleinsert', 'ArticleController@articleinsert')->name('articleinsert');
Route::any('articleedit', 'ArticleController@articleedit')->name('articleedit');
Route::post('articleupdate', 'ArticleController@articleupdate')->name('articleupdate');
Route::delete('articledelete', 'ArticleController@articledelete')->name('articledelete');
?>
