<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsApprover;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('auth.login');
// })->name('login');

Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Vehicle Routing
Route::group(['middleware' => IsAdmin::class], function () {
    Route::get('/vehicle/create', [VehicleController::class, 'getCreateVehicle'])->name('getCreateVehicle');
    Route::post('/vehicle/create', [VehicleController::class, 'createVehicle'])->name('createVehicle');
    Route::get('/vehicle/view', [VehicleController::class, 'getVehicles'])->name('getVehicles');

    // Invoice Routing
    Route::get('/invoice/create/{id}', [InvoiceController::class, 'getCreateInvoice'])->name('getCreateInvoice');
    Route::post('/invoice/create/{id}', [InvoiceController::class, 'createInvoice'])->name('createInvoice');
    Route::get('/invoice/view-all', [InvoiceController::class, 'getInvoices'])->name('getInvoices');
    Route::get('/invoice/view-pending', [InvoiceController::class, 'getPendingInvoices'])->name('getPendingInvoices');
    Route::get('/invoice/export', [InvoiceController::class, 'exportInvoice'])->name('exportInvoice');

});

Route::group(['middleware' => IsApprover::class], function () {
    Route::get('/invoice/view', [InvoiceController::class, 'getInvoicesPerApprover'])->name('getInvoicesPerApprover');
    Route::patch('/invoice/approve/{id}', [InvoiceController::class, 'approveInvoice'])->name('approveInvoice');
    Route::patch('/invoice/deny/{id}', [InvoiceController::class, 'denyInvoice'])->name('denyInvoice');
    Route::get('/invoice/awaiting', [InvoiceController::class, 'getAwaitingApproval'])->name('getAwaitingApproval');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
