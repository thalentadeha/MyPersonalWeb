<?php

use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\Category\ApiCategoryController;
use App\Http\Controllers\API\Portfolio\ApiPortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('portfolios', ApiController::class);
Route::post('login', [ApiController::class, 'login']);

Route::group(['middleware' => ['auth:api']],function(){
    Route::get('portfolios', [ApiPortfolioController::class, 'index']);
    Route::post('portfolios', [ApiPortfolioController::class, 'store']);
    Route::put('portfolios/{id}', [ApiPortfolioController::class, 'update']);
    Route::delete('portfolios/{id}', [ApiPortfolioController::class, 'destroy']);

    Route::get('categories', [ApiCategoryController::class, 'index']);
    Route::post('categories', [ApiCategoryController::class, 'store']);
    Route::put('categories/{id}', [ApiCategoryController::class, 'update']);
    Route::delete('categories/{id}', [ApiCategoryController::class, 'destroy']);

    Route::post('logout', [ApiController::class, 'logout']);
});

