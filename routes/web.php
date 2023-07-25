<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Guest\GuestController;
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

Route::get('/', [GuestController::class, 'index'])->name('HomepageGuest');
Route::get('/admin', [AdminController::class, 'index'])->name('HomepageAdmin');
Route::get('admin/create', [AdminController::class, 'create'])->name('CreateAdmin');
Route::post('admin/store', [AdminController::class, 'store'])->name('AdminStore');
Route::get('admin/show{id}', [AdminController::class, 'show'])->name('showComic');
