<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
// yassine
use App\Http\Controllers\Guest\CategoryController;
use App\Http\Controllers\Guest\ResourceController;
use App\Http\Controllers\ReservationsHistoryController;
use App\Http\Controllers\ResponsableController;
use App\Models\ReservationsHistory;
use App\Models\ResourceCategory;
use App\Http\Controllers\VosReservationController;
use App\Http\Controllers\Reclamations;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserHistory;

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
Route::get('/admin', [AdminController::class, 'displayResources'])->name('admin');
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/admin/modify/{type}/{id}', [AdminController::class, 'modifyResource'])->name('admin.modify.resource');
Route::post('/admin/modify/validate/{type}/{id}', [AdminController::class, 'validateModification'])->name('admin.validate.modification');
Route::get('/admin/create/{type}', [AdminController::class, 'createResource'])->name('admin.create.resource');
Route::post('/admin/create/validate/{type}', [AdminController::class, 'validateCreation'])->name('admin.validate.creation');

Route::get('/admin/users', [AdminController::class, 'displayUsers'])->name('admin.users');
Route::get('/admin/resp/{id}', [AdminController::class, 'toResponsable'])->name('toResponsable');
Route::get('/admin/user/{id}', [AdminController::class, 'toUtilisateur'])->name('toUtilisateur');
Route::post('/admin/create/responsable', [AdminController::class, 'createResponsable'])->name('create.responsable');

Route::get('/admin/history', [AdminController::class, 'displayHistory'])->name('admin.hitory');
Route::get('/admin/statistics', [AdminController::class, 'displayStatistics'])->name('admin.statistics');
Route::get('/admin/support', [AdminController::class, 'displaySupport'])->name('admin.support');


// Route de Responsable
Route::get('/responsable', [ResponsableController::class, 'afficherResources'])->name('responsable');
Route::get('/responsable/search', [ResponsableController::class, 'search'])->name('responsable.search');
Route::get('/responsable/modify/{type}/{id}', [ResponsableController::class, 'modifyResource'])->name('modify-resource');
Route::post('/responsable/modify/validate/{type}/{id}', [ResponsableController::class, 'validateModification'])->name('validate-modification');
Route::get('/responsable/create/{type}', [ResponsableController::class, 'createResource'])->name('create-resource');
Route::post('/responsable/create/validate/{type}', [ResponsableController::class, 'validateCreation'])->name('validate-creation');

Route::get('/responsable/reservations', [ResponsableController::class, 'displayReservations'])->name('responsable.reservations');
Route::get('/responsable/reservation/{id}/accepted', [ReservationsHistoryController::class, 'acceptReservation'])->name('reservation.accept');
Route::get('/responsable/reservation/{id}/refuse', [ReservationsHistoryController::class, 'refuseReservation'])->name('reservation.refuse');

Route::get('/responsable/history', [ResponsableController::class, 'displayHistory'])->name('responsable.hitory');
Route::get('/responsable/reclamations', [ResponsableController::class, 'displayReclamations'])->name('responsable.reclamations');
Route::get('/responsable/support', [ResponsableController::class, 'displaySupport'])->name('responsable.support');


// yassine
Route::get('/dashboard', [UserController::class, 'filter'])->name('dashboard');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/categories/{id}/resources', [ResourceController::class, 'index'])->name('categories.index');

Route::get('/Report', function () {
    return view('User.Report');
})->name('Report');

Route::get('/Reserve/{id}', [ResourceController::class, 'reserve'])->name('reserve');

Route::get('/Reserve/{id_category}/{id}', [ReservationController::class, 'create'])->name('reservation.create');

Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/support', function () {
    return view('User.Support');
})->name('support');
Route::get('/vosreservations', [VosReservationController::class, 'vosreservations'])->name('vosreservations');
Route::get('/history', function () {
    return view('User.History');
})->name('history');
// Route::get('/support/{reservation}', [Reclamations::class, 'reclamer'])->name('support.reclamer');
// Route::post('/reclamations', [Reclamations::class, 'store'])->name('reclamations.store');
Route::post('/reclamations/store', [Reclamations::class, 'store'])->name('reclamations.store');

Route::get('/support-message', [SupportController::class, 'index'])->name('support.message');
Route::post('/support-message', [SupportController::class, 'store'])->name('support.message.store');
Route::get('/history', [UserHistory::class, 'history'])->name('history');

Route::get('/support/{history}', [Reclamations::class, 'reclamer'])->name('support.reclamer');
