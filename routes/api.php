<?php

use App\Http\Controllers\API\TodoController;
use App\Models\Todo;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/hello", function () {
    return ["message" => "Hello API!"];
});

/*
Route::get("/todo", [TodoController::class, 'index']);
Route::get("/todo/{id}", [TodoController::class, 'show']);
Route::post("/todo", [TodoController::class, 'store']);
Route::put("/todo/{id}", [TodoController::class, 'update']);
Route::patch("/todo/{id}", [TodoController::class, 'update']);
Route::delete("/todo/{id}", [TodoController::class, 'destroy']);
*/
Route::apiResource('/todo', TodoController::class);