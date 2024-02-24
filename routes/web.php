<?php

use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Donor\DashboardController as DonorDashboardController;
use App\Http\Controllers\Donor\AppointmentController as DonorAppointmentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/appointments', [AdminAppointmentController::class, 'index'])->name('admin.appointments.index');
    Route::get('/admin/appointments/{id}', [AdminAppointmentController::class, 'show'])->name('admin.appointments.show');
    Route::get('/admin/appointments/{id}/edit', [AdminAppointmentController::class, 'edit'])->name('admin.appointments.edit');
    Route::put('/admin/appointments/{id}', [AdminAppointmentController::class, 'update'])->name('admin.appointments.update');
    Route::delete('/admin/appointments/{id}', [AdminAppointmentController::class, 'destroy'])->name('admin.appointments.destroy');
});

Route::middleware(['auth', 'role:donor'])->group(function () {
    Route::get('/donor/dashboard', [DonorDashboardController::class, 'index'])->name('donor.dashboard');
    Route::get('/donor/appointments', [DonorAppointmentController::class, 'index'])->name('donor.appointments.index');
    Route::get('/donor/appointments/create', [DonorAppointmentController::class, 'create'])->name('donor.appointments.create');
    Route::get('/donor/appointments/{id}/edit', [DonorAppointmentController::class, 'edit'])->name('donor.appointments.edit');
    Route::post('/donor/appointments', [DonorAppointmentController::class, 'store'])->name('donor.appointments.store');
});


require __DIR__ . '/auth.php';
