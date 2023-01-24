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
Route::get('/reservasi/InformasiPJ', [UserController::class, 'penanggungJawab'])->name('penanggungJawab');


/*Login*/
Route::get('/login',[AdminController::class, 'loginpage'])->name('login');
Route::post('/loginuser',[AdminController::class, 'login'])->name('login.post');
Route::get('/admin',[AdminController::class, 'index'])->name('dashboardAdmin');
Route::post('/logout',[AdminController::class, 'logout'])->name('logout.post');

/*Dashboard*/
Route::get('/view', [AdminController::class, 'viewPage'])->name('viewClass');

/*Calendar*/
Route::get('/full-calendar', [CalendarController::class, 'index'])->name('full-calendar');
Route::post('full-calendar/action', [CalendarController::class, 'action']);

/*reservasi*/
Route::get('/list-reservasi',[AdminController::class, 'listReservasi'])->name('list-reservasi');
