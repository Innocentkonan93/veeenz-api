<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/objets", [ObjetController::class, 'getAllObjets']);

Route::get("/objets/{id}", [ObjetController::class, 'getObjet']);

Route::post("/addObjet", [ObjetController::class, 'addObjet']);

Route::patch("updateObjet", [ObjetController::class, 'updateObjet']);

Route::delete("/deleteObjet/{id}", [ObjetController::class, 'deleteObjet']);

Route::get("search/{categorie_name}",[ObjetController::class, 'search']);

Route::apiResource("categorie", CategorieController::class);

Route::post('upload', [FileController::class, 'upload']);