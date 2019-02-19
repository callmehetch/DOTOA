<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('data', 'DataController');
