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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/game', function () {
    return view('pages.game');
});
Route::resource('game_words', 'SectionWordsController');
Route::resource('posts', 'PostController');
Route::post('/game_submit', function (\Illuminate\Http\Request $request) {
    // return response()->json($request);
    return response()-> json(['message' => $request['body']]);
});
Auth::routes();

Route::get('lsapp/public/dashboard', 'DashboardController@index');
