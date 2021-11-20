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
});

Route::get('/',            'MainController@index');
Route::get('/how-to-play', 'MainController@how_to');
Route::get('/login',       'MainController@login');
Route::post('/login',      'MainController@login_route')->name('login.route');
Route::get('/logout',      'MainController@logout');
Route::get('/pictureBook', 'MainController@picturebook');

Route::get('/question', 'QuestionController@index');

Route::get('/ajax/question', 'ajax\QuestionController@question');
Route::get('/ajax/pictureBook', 'ajax\QuestionController@pictureBook');