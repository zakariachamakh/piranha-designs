<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Routes with 'auth' and 'role:admin' middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    // List all staff members
    Route::get('/admin/staff', [AdminController::class, 'index'])->name('admin.staff.index');

    // Store a new staff member
    Route::post('/admin/staff/store', [AdminController::class, 'store'])->name('admin.staff.store');

    // Show details and policies of a specific staff member
    Route::get('/admin/staff/{id}/policies', [AdminController::class, 'show'])->name('admin.staff.show');

    // Assign a policy to a staff member
    Route::post('/admin/staff/{id}/policies/add', [AdminController::class, 'assignPolicy'])->name('admin.staff.assignPolicy');

    // Remove a policy from a staff member
    Route::delete('/admin/staff/{id}/policies/{policyId}/remove', [AdminController::class, 'removePolicy'])->name('admin.staff.removePolicy');

    // Remove (soft delete) a staff member
    Route::delete('/admin/staff/{id}/remove', [AdminController::class, 'removeStaff'])->name('admin.staff.remove');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', [StaffDashboardController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('/staff/policies/{id}', [StaffDashboardController::class, 'showPolicy'])->name('staff.policy.details');
});

