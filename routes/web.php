<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\LembarController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

// Public Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth: Login, Register, Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Questions
Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');
Route::get('question/respon', [QuestionController::class, 'respon'])->name('question.respon');

// Main Admin Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Pelanggan (Data Pembeli)
Route::resource('pelanggan', PelangganController::class);

// CRUD User & Quick Role Switcher
Route::patch('user/{id}/role', [UserController::class, 'updateRole'])->name('user.update-role');
Route::resource('user', UserController::class);

// CRUD Mitra
Route::resource('mitra', MitraController::class);

// CRUD Kurir
Route::resource('kurir', KurirController::class);

// Verifikasi Akun (Mitra, Kurir, Admin)
Route::prefix('admin/verification')->name('admin.verification.')->group(function () {
    Route::get('/', [VerificationController::class, 'index'])->name('index');
    Route::patch('/{id}/approve', [VerificationController::class, 'approve'])->name('approve');
    Route::patch('/{id}/reject', [VerificationController::class, 'reject'])->name('reject');
});

/*
|--------------------------------------------------------------------------
| Lembar (Sistem Printing Mahasiswa) Routes
|--------------------------------------------------------------------------
| Terintegrasi dengan Tabler Core + Desain Khas Lembar
*/
Route::prefix('lembar')->name('lembar.')->group(function () {
    // Beranda & Interactive Workbench
    Route::get('/', [LembarController::class, 'index'])->name('index');

    // Role: Pembeli (Buyer)
    Route::prefix('buyer')->name('buyer.')->group(function () {
        Route::get('/home', [LembarController::class, 'buyerHome'])->name('home');
        Route::get('/marketplace', [LembarController::class, 'buyerMarketplace'])->name('marketplace');
        Route::get('/orders', [LembarController::class, 'buyerOrders'])->name('orders');
        Route::get('/addresses', [LembarController::class, 'buyerAddresses'])->name('addresses');
        Route::get('/profile', [LembarController::class, 'buyerProfile'])->name('profile');
    });

    // Role: Mitra Printing (Partner)
    Route::prefix('partner')->name('partner.')->group(function () {
        Route::get('/dashboard', [LembarController::class, 'partnerDashboard'])->name('dashboard');
        Route::get('/incoming', [LembarController::class, 'partnerIncoming'])->name('incoming');
        Route::get('/queue', [LembarController::class, 'partnerQueue'])->name('queue');
        Route::get('/services', [LembarController::class, 'partnerServices'])->name('services');
        Route::get('/schedule', [LembarController::class, 'partnerSchedule'])->name('schedule');
        Route::get('/revenue', [LembarController::class, 'partnerRevenue'])->name('revenue');
    });

    // Role: Kurir (Courier)
    Route::prefix('courier')->name('courier.')->group(function () {
        Route::get('/dashboard', [LembarController::class, 'courierDashboard'])->name('dashboard');
        Route::get('/tasks', [LembarController::class, 'courierTasks'])->name('tasks');
        Route::get('/history', [LembarController::class, 'courierHistory'])->name('history');
    });

    // Role: Administrator (Admin)
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [LembarController::class, 'adminDashboard'])->name('dashboard');
        Route::get('/partners', [LembarController::class, 'adminPartners'])->name('partners');
        Route::get('/orders', [LembarController::class, 'adminOrders'])->name('orders');
        Route::get('/payments', [LembarController::class, 'adminPayments'])->name('payments');
        Route::get('/complaints', [LembarController::class, 'adminComplaints'])->name('complaints');
    });
});
