<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Show all employees on the home page
Route::get('/', [EmployeeController::class, 'index'])->name('home');

// Show the create employee form
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');

// Store a new employee
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Show the edit employee form
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

// Update an employee
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

// Delete an employee
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

// Search employees
Route::get('/employees/search', [EmployeeController::class, 'search'])->name('employees.search');