<?php

use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cart/{id}', [HomeController::class, 'cart'])->name('cart');
Route::post('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/payment/{id}', [HomeController::class, 'payment'])->name('payment');
Route::get('/riwayat', [HomeController::class, 'history'])->name('history');

Route::prefix('/admin')->group(function() {
    Route::middleware(['auth', 'role:admin'])->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('/cars', CarsController::class);

        Route::get('/pengguna', [UserController::class, 'index'])->name('user');

        Route::get('/sewa', [RentController::class, 'index'])->name('sewa');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
