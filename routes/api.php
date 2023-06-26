<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversionController;
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

//Route de l'api de connexion
Route::post('/login', [AuthController::class,'login']);

//Route de l'api de déconnexion
Route::post('/logout',[AuthController::class,'logout']);

// Route pour tester mon api
Route::get('/test_api', function(){
    return response()->json(
       [ 
        'status' => 'done',
        'message' => 'Votre api fonctionne'
        ]
    );
});

// Route pour retourner la liste des paires
Route::get('/listes_pairs', [ConversionController::class,'index']);

// Route pour créer une paire
Route::post('/create_pairs', [ConversionController::class,'store']);

// Route pour modifier une paire
Route::put('/edit_pairs/{id}',[ConversionController::class,'update']);

//Route pour supprimer une paire
Route::delete('delete/{Conversion}',[ConversionController::class,'delete']); //on met le paamètre qu'on veut aller récupérer
