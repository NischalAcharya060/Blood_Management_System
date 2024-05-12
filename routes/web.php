<?php

use App\Http\Controllers\Admin\AdminBloodRequestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BloodRequestController;
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

//welcome page
Route::get('/', function () {
    return view('welcome');
});

//admin dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

//admin profile
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin user management
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

//user dashboard
Route::get('/user_dashboard', function () {
    return view('user_dashboard');
})->middleware(['auth', 'verified'])->name('user_dashboard');

//user blood Request
Route::middleware(['auth', 'role:user'])->group(function () {
Route::get('/blood_requests/create', [BloodRequestController::class, 'create'])->name('blood_requests.create');
Route::post('/blood_requests', [BloodRequestController::class, 'store'])->name('blood_requests.store');
});

//admin blood Request
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::get('/admin/blood_requests', [AdminBloodRequestController::class, 'index'])->name('admin.blood_requests.index');
Route::get('/admin/blood-requests/{bloodRequest}', [AdminBloodRequestController::class, 'show'])->name('admin.blood_requests.show');
Route::get('/admin/blood-requests/{bloodRequest}/edit', [AdminBloodRequestController::class, 'edit'])->name('admin.blood_requests.edit');
Route::put('/admin/blood-requests/{bloodRequest}', [AdminBloodRequestController::class, 'update'])->name('admin.blood_requests.update');
Route::delete('/admin/blood-requests/{bloodRequest}', [AdminBloodRequestController::class, 'destroy'])->name('admin.blood_requests.destroy');
});
