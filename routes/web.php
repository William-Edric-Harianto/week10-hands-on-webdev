<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [CustomerController::class, 'index'])->name('customer-list');
Route::get('/create-customer', [CustomerController::class, 'create'])->name('create-customer');
Route::post('/store-customer', [CustomerController::class, 'store'])->name('store-customer');
Route::get('/edit-customer/{customer}', [CustomerController::class, 'edit'])->name('edit-customer');
Route::post('/update-customer/{customer}', [CustomerController::class, 'update'])->name('update-customer');
Route::delete('/delete-customer/{customer}', [CustomerController::class, 'destroy'])->name('delete-customer');

Route::get('/service', [ServiceController::class, 'index'])->name('service-list');
Route::get('/create-service', [ServiceController::class, 'create'])->name('create-service');
Route::post('/store-service', [ServiceController::class, 'store'])->name('store-service');
Route::get('/edit-service/{service}', [ServiceController::class, 'edit'])->name('edit-service');
Route::post('/update-service/{service}', [ServiceController::class, 'update'])->name('update-service');
Route::delete('/delete-service/{service}', [ServiceController::class, 'destroy'])->name('delete-service');
