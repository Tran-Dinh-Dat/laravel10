<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TodoList;

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

Route::get('upload', [FileController::class, 'index'])->name('index');
Route::post('upload', [FileController::class, 'store'])->name('upload');
Route::patch('update/{file}', [FileController::class, 'update'])->name('update');
Route::get('update/{file}', [FileController::class, 'edit'])->name('edit');
Route::get('loading', function () {
    return view('loading.index');
});

 
Route::get('/todos', TodoList::class);

Route::controller(FullCalenderController::class)->group(function(){
    Route::get('fullcalender', 'index');
    Route::post('fullcalenderAjax', 'ajax');
});

Route::get('/calendar', function () {
    return view('calendar');
});
