<?php
use App\Http\Controllers\PropertyController;
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
Route::post('/properties', [PropertyController::class, 'create']);
Route::get('/properties', [PropertyController::class, 'search']);
Route::get('/properties/nearby', [PropertyController::class, 'searchByRadius']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
