<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*User*/
Route::controller(UserController::class)->group(function () {
    Route::get('/welcome', 'home')->name('home');
    Route::get('/status', 'status')->name('status');
    Route::get('/staffdisplay', 'staffDisplay')->name('staffDisplay');
    Route::get('/panduan', 'panduan')->name('panduanReservasi');
    Route::get('/jadwal', 'jadwal')->name('jadwal');
});

/*Make Reservation*/
Route::controller(ReservasiController::class)->group(function () {
    Route::get('/reservasi','stepOne')->name('reservasi');
    Route::post('/reservasipost', 'createOne')->name('postCreateStepOne');
    Route::get('/reservasi/InformasiPJ', 'stepTwo')->name('penanggungJawab');
    Route::post('/reservasi/InformasiPJpost', 'createTwo')->name('postCreateStepTwo');
    Route::get('/reservasi/detailPeminjaman', 'stepThree')->name('detailPeminjaman');
    Route::post('/fetch-Ruangan','detailPeminjamanAjax')->name('detailPeminjamanAjax');
    Route::post('/reservasi/detailPeminjamanpost', 'createThree')->name('postCreateStepThree');
    Route::get('/reservasi/detailKegiatan', 'stepFour')->name('detailKegiatan');
    Route::post('/reservasi/detailKegiatanpost', 'createFour')->name('postCreateStepFour');
    Route::get('/confirmed', 'confirm')->name('confirmed');
});

/*Login*/
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::post('/loginuser',[AdminController::class, 'login'])->name('login.post');
Route::get('/admin',[AdminController::class, 'index'])->name('dashboardAdmin');
Route::post('/logout',[AdminController::class, 'logout'])->name('logout.post');

/*Dashboard*/
Route::get('/view', [AdminController::class, 'testingMap'])->name('testingMap');

/*Calendar*/
Route::get('full-calendar', [CalendarController::class, 'index'])->name('full-calendar');
Route::get('full-calendar/Lantai1', [CalendarController::class, 'lantaiSatu'])->name('lantaiSatu');
Route::post('full-calendar/action', [CalendarController::class, 'action']);

/*List Reservasi*/
Route::get('/list-reservasi',[ReservasiController::class, 'listReservasi'])->name('listReservasi');
Route::get('/detailreservasi/{id}',[ReservasiController::class, 'detailReservasi'])->name('detail-reservasi');
Route::post('/detailreservasi/{id}/terima',[ReservasiController::class, 'terima'])->name('terimaReservasi');

/*Upload*/
Route::get('/upload-petunjuk',[AdminController::class, 'uploadpetunjuk'])->name('uploadPetunjuk');
Route::post('/upload-petunjuk/post',[AdminController::class, 'uploadpdf'])->name('uploadPDF');
Route::get('/upload-jadwal',[AdminController::class, 'uploadJadwal'])->name('uploadJadwal');

/*Export Import*/
Route::get('file-import-export', [AdminController::class, 'fileImportExport']);
Route::post('file-import', [AdminController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [AdminController::class, 'fileExport'])->name('file-export');
