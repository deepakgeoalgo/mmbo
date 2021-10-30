<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    // User
    Route::get('users', [UserController::class,'index'])->name('users.index');    
    Route::get('users/create', [UserController::class,'create'])->name('users.create');
    Route::post('users', [UserController::class,'store'])->name('users.store');
    Route::get('users/edit/{id?}', [UserController::class,'edit'])->name('users.edit');
    Route::post('users/update/{id?}', [UserController::class,'update'])->name('users.update');
    Route::get('users/destroy/{id?}', [UserController::class,'destroy'])->name('users.destroy');

    // Invoice
    Route::get('invoice', [InvoiceController::class,'index'])->name('invoice.index');    
    Route::get('invoice/create', [InvoiceController::class,'create'])->name('invoice.create');
    Route::post('invoice', [InvoiceController::class,'store'])->name('invoice.store');
    Route::get('invoice/edit/{id?}', [InvoiceController::class,'edit'])->name('invoice.edit');
    Route::post('invoice/update/{id?}', [InvoiceController::class,'update'])->name('invoice.update');
    Route::get('invoice/destroy/{id?}', [InvoiceController::class,'destroy'])->name('invoice.destroy');

});
