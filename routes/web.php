<?php

use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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
    return redirect(route('person_index'));
});
Route::match(['get'], '/person', [PersonController::class, 'index'])->name('person_index');
Route::match(['get', 'post'], '/person/xml-upload', [PersonController::class, 'xml_upload'])->name('person_xml_upload');
Route::match(['get'], '/log', [LogController::class, 'index'])->name('log_index');
