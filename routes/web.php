<?php

use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\WelcomeController;
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


//user
Route::get('/',[WelcomeController::class, 'index']);
Route::resource('/portofolio', WelcomeController::class);
Auth::routes([
    // 'register' => false,
    'confirm' => false
]);

//admin
Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin');

//admin editable resources
Route::resource('/admin/portfolios', PortfolioController::class);
Route::resource('/admin/categories', CategoryController::class);
Route::resource('/admin/aboutmes', AboutMeController::class);
Route::resource('/admin/aboutmes/skills', SkillController::class);
