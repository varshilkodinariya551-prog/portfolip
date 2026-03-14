<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SettingController;

// Public Routes
Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/projects', [ProjectController::class , 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class , 'show'])->name('projects.show');
Route::post('/contact', [ContactController::class , 'store'])->name('contact.store');

// Auth Routes
Route::get('/login', [AuthController::class , 'showLogin'])->name('login');
Route::post('/login', [AuthController::class , 'login']);
Route::post('/logout', [AuthController::class , 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class , 'index'])->name('dashboard');
    Route::resource('projects', AdminProjectController::class);
    Route::resource('skills', AdminSkillController::class);
    Route::get('contacts', [AdminContactController::class , 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class , 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class , 'destroy'])->name('contacts.destroy');
    Route::get('settings', [SettingController::class , 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class , 'update'])->name('settings.update');
});
