<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
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
Route::get('/signup', [AdminController::class, 'viewSignUp'])->name('viewSignUp');
Route::get('/welcome', [UserController::class, 'home'])->name('home');
Route::get('/reservasi', [UserController::class, 'reservasi'])->name('reservasi');
Route::post('/reservasipost', [UserController::class, 'postCreateStepOne'])->name('postCreateStepOne');
Route::get('/reservasi/InformasiPJ', [UserController::class, 'penanggungJawab'])->name('penanggungJawab');
Route::post('/reservasi/InformasiPJpost', [UserController::class, 'postCreateStepTwo'])->name('postCreateStepTwo');
Route::get('/reservasi/detailPeminjaman', [UserController::class, 'detailPeminjaman'])->name('detailPeminjaman');
Route::post('/reservasi/detailPeminjamanpost', [UserController::class, 'postCreateStepThree'])->name('postCreateStepThree');
Route::get('/reservasi/detailKegiatan', [UserController::class, 'detailKegiatan'])->name('detailKegiatan');
Route::post('/reservasi/detailKegiatanpost', [UserController::class, 'postCreateStepFour'])->name('postCreateStepFour');
Route::get('/staffdisplay', [UserController::class, 'staffDisplay'])->name('staffDisplay');
Route::get('/panduan', [UserController::class, 'panduan'])->name('panduanReservasi');
Route::get('/jadwal', [UserController::class, 'jadwal'])->name('jadwal');


/*Login*/
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::post('/loginuser',[AdminController::class, 'login'])->name('login.post');
Route::get('/admin',[AdminController::class, 'index'])->name('dashboardAdmin');
Route::post('/logout',[AdminController::class, 'logout'])->name('logout.post');

/*Dashboard*/
Route::get('/view', [AdminController::class, 'viewPage'])->name('viewClass');

/*Calendar*/
Route::get('full-calendar', [CalendarController::class, 'index'])->name('full-calendar');
Route::get('full-calendar/Lantai1', [CalendarController::class, 'lantaiSatu'])->name('lantaiSatu');
Route::post('full-calendar/action', [CalendarController::class, 'action']);

/*reservasi*/
Route::get('/list-reservasi',[AdminController::class, 'listReservasi'])->name('list-reservasi');
Route::get('/upload-petunjuk',[AdminController::class, 'uploadpetunjuk'])->name('uploadPetunjuk');
Route::post('/upload-petunjuk/post',[AdminController::class, 'uploadpdf'])->name('uploadPDF');
Route::get('/upload-jadwal',[AdminController::class, 'uploadJadwal'])->name('uploadJadwal');
Route::get('/detailreservasi/{id}',[AdminController::class, 'DetailReservasi'])->name('detail-reservasi');
Route::post('/detailreservasi/{id}/terima',[AdminController::class, 'terima'])->name('terimaReservasi');

/*Export Import*/
Route::get('file-import-export', [AdminController::class, 'fileImportExport']);
Route::post('file-import', [AdminController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [AdminController::class, 'fileExport'])->name('file-export');
