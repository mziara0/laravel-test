<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadExcelController;
use App\Http\Controllers\QueriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('upload-excel', 'upload-excel');
Route::post('upload-excel', [UploadExcelController::class, 'store']);

Route::get('queries', [QueriesController::class, 'index']);

Route::view('cron-job', 'cron-job');
