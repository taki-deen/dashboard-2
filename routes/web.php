<?php

use App\Http\Controllers\SuperAdmin\DashboardController as SuperDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\SuperAdmin\ProductController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('super-admin')->as('super.')->middleware(['super_admin'])->group(function () {
    Route::get('/index', [SuperDashboardController::class, 'index'])->name('index');
    
    Route::prefix('products')->as('product.')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit'); // Show the edit form
        Route::patch('/update/{id}', [ProductController::class, 'update'])->name('update'); // PATCH route for updating product
    });
});


Route::prefix('admin')->as('admin.')->middleware(['admin'])->group(function () {
Route::get('/index',[AdminDashboardController::class,'index'])->name('index');

});
Route::prefix('user')->as('user.')->middleware(['user'])->group(function () {
    Route::get('/index',[UserDashboardController::class,'index'])->name('index');

});
