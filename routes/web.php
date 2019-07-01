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
Auth::routes(['register' => false]);

Route::get('/{locale?}', function ($locale = 'en') {
    App::setLocale($locale);
    return view('chat');
})->where('locale', '[a-z]{2}');


Route::get('/test/{locale?}', function ($locale = 'en') {
    App::setLocale($locale);
    return view('test');
})->where('locale', '[a-z]{2}');
