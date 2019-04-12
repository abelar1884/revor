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

Route::get('/', 'MainController@index')->name('index');

Route::get('/manga/single/{manga}', 'MangaController@singlePage')->name('manga.single');

Route::get('/manga/add', 'MangaController@addPage')->name('manga.add');
Route::get('/manga/parsing', 'MangaController@parsingPage')->name('manga.parsing');

Route::post('/manga/upload', 'MangaController@addManga');
Route::post('/manga/parsing-do', 'MangaController@parsing');
Route::post('/manga/remove', 'MangaController@remove');
