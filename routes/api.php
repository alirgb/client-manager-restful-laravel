<?php

use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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



// Register public route
Route::post('/register', [AuthController::class, 'register']);

// login public route
Route::post('/login', [AuthController::class, 'login']);

// logout protected route using sanctum
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);



// show all clients
Route::get('/clients', [ClientController::class, 'index'] );
// show client by id
Route::get('/clients/{client}', [ClientController::class, 'show'] );
// search client by name
Route::get('/clients/search/{client}', [ClientController::class, 'search'] );
// create client
Route::post('/clients', [ClientController::class, 'store']);
//update client
Route::put('/clients/{client}', [ClientController::class, 'update']);
//delete client
Route::delete('/clients/{client}', [ClientController::class, 'destroy']);




// // ANOTHER WAY TO IMPLEMENT EACH REQUEST INDIVIDUALLY and SPECIFICALLY using sanctum authentication
// Route::group(['middleware' => ['auth:sanctum']], function () {
//     // show all clients
//     Route::get('/clients', [ClientController::class, 'index'] );
//     // show client by id
//     Route::get('/clients/{client}', [ClientController::class, 'show'] );
//     // search client by name
//     Route::get('/clients/search/{client}', [ClientController::class, 'search'] );
//     // create client
//     Route::post('/clients', [ClientController::class, 'store']);
//     //update client
//     Route::put('/clients/{client}', [ClientController::class, 'update']);
//     //delete client
//     Route::delete('/clients/{client}', [ClientController::class, 'destroy']);
// });


// // protected GET POST DELETE PUT Search routes using sanctum authentication
// Route::middleware('auth:sanctum')->resource('clients', ClientController::class);
// Route::middleware('auth:sanctum')->get('/clients/search/{client}', [ClientController::class, 'search'] );