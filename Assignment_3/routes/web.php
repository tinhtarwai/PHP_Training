<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StudentController::class, 'index']);
Route::get('/create', [StudentController::class, 'create']);
Route::post('/store', [StudentController::class, 'store']);
Route::get('/edit/{id}', [StudentController::class, 'edit']);
Route::post('/update/{id}', [StudentController::class, 'update']);
Route::delete('/destroy/{id}', [StudentController::class, 'destroy']);
Route::get('/export', [StudentController::class, 'export']);
Route::get('/import', [StudentController::class, 'import']);
Route::get('/search', [StudentController::class, 'search']);
Route::get('/send-mail-form', [MailController::class, 'sendmailform']);
Route::get('/sendmailform2', [MailController::class, 'sendmailform2']);
Route::post('/upload', [MailController::class, 'uploadDocument']);
Route::post('/mail-send',[MailController::class,'sendMail'])->name('send.email');

