<?php

declare(strict_types=1);

use App\Http\Controllers\GetSales;
use App\Http\Controllers\GetSeller;
use App\Http\Controllers\GetSellerContacts;
use App\Http\Controllers\GetSellerSales;
use App\Http\Controllers\LoadFile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/load', LoadFile::class)->name('loadFile');

Route::get('/sellers/{sellerId}', GetSeller::class)->name('getSeller');
Route::get('/sellers/{sellerId}/contacts', GetSellerContacts::class)->name('getSellerContacts');
Route::get('/sellers/{sellerId}/sales', GetSellerSales::class)->name('getSellerSales');
Route::get('/sales/{year}', GetSales::class)->name('getSales');