<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [UserController::class, 'Home']);
// halaman signin
Route::get('/signin', [AuthController::class, 'Signin']);
Route::post('/signin', [AuthController::class, 'userRegister']);
// halaman login & logout
Route::get('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthController::class, 'cekLogin']);
Route::get('/logout', [authController::class, 'logout'])->middleware('auth');

// halaman admin
Route::get('/verifikasi', [AdminController::class, 'VerifikasiHalaman'])->middleware('auth');
Route::get('/verifikasi/detailProduct/{id}', [AdminController::class, 'detailProduct'])->middleware('auth');
Route::get('/verifikasi/VerifikasiProduct/{id}', [AdminController::class, 'verifikasiProduct'])->middleware('auth');
Route::put('/verifikasi/VerifikasiProduct/{id}', [AdminController::class, 'productVerification'])->middleware('auth');
Route::get('/permintaanpickup', [AdminController::class, 'permintaanpickup']);
Route::get('/permintaanpickup/detailpermintaan/{id}', [AdminController::class, 'detailpermintaan']);
Route::get('/permintaanpickup/verifikasipermintaan/{id}', [AdminController::class, 'verifikasiPermintaanPickUp']);
Route::put('/permintaanpickup/verifikasipermintaan/{id}', [AdminController::class, 'prosesverifikasipickup']);

// halamaan eksportir
Route::get('/addproduct', [UserController::class, 'addProduct'])->middleware('auth');
Route::post('/addproduct', [UserController::class, 'insertProduct'])->middleware('auth');
Route::get('/product', [UserController::class, 'daftarproduct'])->middleware('auth');
Route::get('/detailProduct/{id}', [UserController::class, 'detailProduct'])->middleware('auth');
Route::post('/detailProduct/{id}', [UserController::class, 'payments'])->middleware('auth');
Route::get('/sukses', [UserController::class, 'sukses'])->middleware('auth');
Route::get('/daftarPickup', [UserController::class, 'daftarPickup'])->middleware('auth');
Route::get('/requestPickup/{id}', [UserController::class, 'requestPickup'])->middleware('auth');
Route::post('/requestPickup/{id}', [UserController::class, 'requestPickupMade'])->middleware('auth');
Route::get('/permintaanrevisi', [UserController::class, 'revisi'])->middleware('auth');
Route::get('/updateProduk/{id}', [UserController::class, 'updateProduk'])->middleware('auth');
Route::put('/updateProduk/{id}', [UserController::class, 'revisiProduk'])->middleware('auth');
Route::get('/pickup', [UserController::class, 'pickup'])->middleware('auth');

// halamanan importir
Route::get('/pesanan', [UserController::class, 'pesanan'])->middleware('auth');
Route::get('/pesanan/detailPesanan/{id}', [UserController::class, 'detailpesanan'])->middleware('auth');
Route::get('/pesanan/statusPesanan/{id}', [UserController::class, 'statusPesanan'])->middleware('auth');
Route::put('/pesanan/statusPesanan/{id}', [UserController::class, 'updateStatusPesanan'])->middleware('auth');
Route::get('/daftarRequest', [UserController::class, 'daftarRequest'])->middleware('auth');
Route::get('/detailRequest/{id}', [UserController::class, 'detailRequest'])->middleware('auth');
Route::get('/updateRequest/{id}', [UserController::class, 'updateStatus'])->middleware('auth');
Route::put('/updateRequest/{id}', [UserController::class, 'updateStatusRequest'])->middleware('auth');
Route::get('/requestBarang', [UserController::class, 'requestBarang'])->middleware('auth');
Route::post('/requestBarang', [UserController::class, 'requestmade'])->middleware('auth');
Route::get('/pencairanDana', [UserController::class, 'pencairandana'])->middleware('auth');
