<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


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

// Uncommented out routes
// Route::get('/',[ImageController::class,'index']);
// Route::post('/upload-images',[ImageController::class,'store']);

Route::get('/show-form', [ImageController::class, 'showForm'])->name('upload.view');
Route::post('/upload-form', [ImageController::class, 'uploadFile'])->name('upload.file');

Route::get('/display_files', [ImageController::class, 'index'])->name('display.files');


