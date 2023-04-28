<?php

use App\Http\Controllers\webController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortfolioController;
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

Route::get('/', [webController::class, 'index']);
// Route::get('/admin', [webController::class, 'admin']);
Route::group(['prefix' => '/admin'], function(){
    Route::get('/', [AdminController::class, 'starter'])->name('admin.admin');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Route::get('/about', [webController::class, 'about']);
// Route::group(['prefix' => '/test'], function(){
//     Route::get('/route1/{param1}', function($param1){
//         return $param1;
//     })->name('test.route1');
//     Route::get('/route2/{param2}', function($param2){
//         return $param2;
//     })->name('test.route2');
// });
Auth::routes([
    // 'register' => false,
    'confirm' => false
]);

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::resource('/admin/portfolios', PortfolioController::class);
