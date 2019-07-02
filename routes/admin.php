<?php

Route::get('home', 'HomeController@index');

Route::resource('languages', 'LanguageController')->except(['show']);
Route::resource('answers', 'AnswerController')->except(['show']);

