<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DatabaseController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\DesignationController;
use \App\Http\Controllers\AssignDesignationController;
use App\Http\Controllers\DeductionsController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\EarningsController;
use App\Http\Controllers\GovernmentContributionsController;
use App\Http\Controllers\PayrollController;

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

Route::get('/', [DatabaseController::class, 'milestone2']);
Route::get('/milestone2', [DatabaseController::class, 'milestone2'])->name('milestone2');

Route::get('/create_department', [DatabaseController::class, 'index']);

Route::post('/employees', [DatabaseController::class, 'store'])->name('employees.store');

Route::get('/employees', [DatabaseController::class, 'index'])->name('employees.index');

Route::get('/employees/{employee}/edit', [DatabaseController::class, 'edit'])->name('employees.edit');

Route::put('/employees/{employee}', [DatabaseController::class, 'update'])->name('employees.update');

Route::delete('/employees/{employee}', [DatabaseController::class, 'destroy'])->name('employees.destroy');

Route::get('/designations/create', [DesignationController::class, 'create'])->name('designations.create');

Route::post('/designations', [DesignationController::class, 'store'])->name('designations.store');

Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');

Route::get('/employees/{employee}', [DatabaseController::class, 'edit'])->name('employees.edit');

Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');

Route::get('/designations', [DesignationController::class, 'index'])->name('designations.index');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

Route::get('/departments/designations', [DepartmentController::class, 'departmentsDesignations']);

Route::get('/create_department', [DatabaseController::class, 'createDepartment'])->name('create_department');

Route::get('/create_designation', [DatabaseController::class, 'createDesignation'])->name('create_designation');

Route::get('/employees/search', [DatabaseController::class, 'search'])->name('employees.search');

Route::get('/search_results', [DatabaseController::class, 'search'])->name('search_results');

Route::delete('/designations/{id}', 'DesignationController@destroy')->name('designations.destroy');

Route::post('/leaves/store', [LeavesController::class, 'store'])->name('leaves.store');

Route::get('/leaves/create', [LeavesController::class, 'create'])->name('leaves.create');

Route::delete('/leaves/{leave}', [LeavesController::class, 'destroy'])->name('leaves.destroy');

Route::get('/leaves', [LeavesController::class, 'index'])->name('leaves.index');

Route::get('/earnings', [EarningsController::class, 'create'])->name('earnings.create');

Route::post('/earnings/store', [EarningsController::class, 'store'])->name('earnings.store');

Route::delete('/earnings/{earnings}', [EarningsController::class, 'destroy'])->name('earnings.destroy');

Route::get('/deductions', [DeductionsController::class, 'create'])->name('deductions.create');

Route::post('/deductions/store', [DeductionsController::class, 'store'])->name('deductions.store');

Route::delete('/deductions/{deductions}', [DeductionsController::class, 'destroy'])->name('deductions.destroy');
Route::get('/government_contributions', [GovernmentContributionsController::class, 'index'])->name('government_contributions.index');
Route::get('/government_contributions/create', [GovernmentContributionsController::class, 'create'])->name('government_contributions.create');

Route::post('/government_contributions/store', [GovernmentContributionsController::class, 'store'])->name('government_contributions.store');

Route::delete('/government_contributions/{government_contributions}', [GovernmentContributionsController::class, 'destroy'])->name('government_contributions.destroy');
Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.index');
Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payroll.create');

Route::post('/payroll/store', [PayrollController::class, 'store'])->name('payroll.store');

Route::delete('/payroll/{payroll}', [PayrollController::class, 'destroy'])->name('payroll.destroy');

