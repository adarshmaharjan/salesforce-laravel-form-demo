<?php

use App\Http\Controllers\SalesforceAccountController;
use App\Http\Controllers\SalesforceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', [SalesforceAccountController::class, 'index'])->name('home');


Route::get('/auth/salesforce', [SalesforceController::class, 'redirectToSalesforce'])->name('verify.salesforce');

Route::get('/callback', [SalesforceController::class, 'handleCallback']);


Route::get('/salesforce/data', [SalesforceController::class, 'querySalesforceData']);

Route::get('/create', [SalesforceAccountController::class, 'create'])->name('create-sobject');

Route::post('salesforce/create/account', [SalesforceAccountController::class, 'store'])->name('create-account');

Route::get('/flush', function (Request $request) {
    $request->session()->flush();
    return Redirect::route('home');
});
