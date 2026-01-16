<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
// yassine
use App\Http\Controllers\Guest\CategoryController;
use App\Http\Controllers\Guest\ResourceController;
use App\Models\ResourceCategory;


// Route de Guest
Route::get('/', function () {
    $categories = ResourceCategory::all();
    return view('welcome', compact('categories'));
})->name('home');


Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Route de Administrateur
Route::get('/admin', [AdminController::class, 'afficherUsers'])->name('admin');
Route::get('/admin/resp/{id}', [AdminController::class, 'toResponsable'])->name('toResponsable');
Route::get('/admin/user/{id}', [AdminController::class, 'toUtilisateur'])->name('toUtilisateur');

// Route de Responsable
Route::get('/responsable', function () {
    return view('Responsable.responsable');
})->name('responsable');


// yassine
Route::get('/dashboard', [UserController::class, 'filter'])->name('dashboard');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/categories/{id}/resources', [ResourceController::class, 'index'])->name('categories.index');

Route::get('/Report', function () {return view('User.Report');})->name('Report');

Route::get('/Reserve/{id}', [ResourceController::class, 'reserve'])->name('reserve');

Route::get('/Reserve/{id_categorie}/{id}', [ReservationController::class, 'create'])->name('reservation.create');

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');