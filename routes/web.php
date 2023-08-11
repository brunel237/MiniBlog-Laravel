<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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
})->name('welcome');


Route::get('/login', function (){ return view('auth.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('authLogin');


Route::get('/register', function (){ return view('auth.register'); })->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('authRegister');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('publication', PublicationController::class)->except(['update'])->middleware('auth');
Route::resource('user', UserController::class);

Route::post('publication/{publication}', [PublicationController::class, 'update'])->middleware('auth')->name('publication.update');

Route::get("/profile/edit-password", [AuthController::class, 'pass_edit'])->name('pass_edit');
Route::post("/profile/update-password", [AuthController::class, 'pass_update'])->name('pass_update');

// Route::get('/registration/{?}', function (){
//     return view('publication.show');
// })->name('publication.show');

