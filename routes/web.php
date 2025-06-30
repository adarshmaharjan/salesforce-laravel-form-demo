<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Omniphx\Forrest\Providers\Laravel\Facades\Forrest;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/authenticate', function () {
    Forrest::authenticate();
    return Redirect::to('/');
});

Route::get('/callback', function () {
    Forrest::callback();
    return Redirect::route('home');
});

Route::get('query', function () {
    $response = Forrest::query('SELECT Id FROM Account');
    dd($response);
});
