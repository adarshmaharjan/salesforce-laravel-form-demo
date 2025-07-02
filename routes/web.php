<?php

use App\Http\Controllers\SalesforceAccountController;
use App\Http\Controllers\SalesforceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


// Salesforce authentication

Route::get('/auth/salesforce', [SalesforceController::class, 'redirectToSalesforce'])->name('verify.salesforce');

Route::get('/callback', [SalesforceController::class, 'handleCallback']);

// Route::get('/salesforce/data', [SalesforceController::class, 'querySalesforceData']);

// Salesforce Account

Route::get('/salesforce/accounts', [SalesforceAccountController::class, 'index'])->name('account');

Route::get('/salesforce/account/create', [SalesforceAccountController::class, 'create'])->name('create-account');

Route::post('/salesforce/account/create', [SalesforceAccountController::class, 'store'])->name('post-account');



Route::get('/salesforce/account/{id}', [SalesforceAccountController::class, 'show'])->name('show-account');

Route::get('/salesforce/account/{id}/edit', [SalesforceAccountController::class, 'edit'])->name('edit-account');

Route::post('/salesforce/account/{id}/update', [SalesforceAccountController::class, 'update'])->name('update-account');







Route::get('/flush', function (Request $request) {
    $request->session()->flush();
    return Redirect::route('home');
});
