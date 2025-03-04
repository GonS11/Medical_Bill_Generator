<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index')->middleware('auth');

Route::resource('/users', UserController::class)->middleware('isAdmin');

Route::get('/certificate/{id}/generate_certificate', [CertificateController::class, 'generateCertificate'])->middleware('isDoctor');
Route::resource('/certificate', CertificateController::class)->middleware('isDoctor');

Route::get('/consults/{id}/generate_bill', [ConsultController::class, 'generateBill'])->middleware('isAdministrative');
Route::resource('/consults', ConsultController::class)->middleware('isAdministrative');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
