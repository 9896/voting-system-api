<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function(){

Route::get('/users', [App\Http\Controllers\Api\UsersController::class,'index']);
Route::post('/users', [App\Http\Controllers\Api\UsersController::class,'store']);
Route::get('/users/{id}', [App\Http\Controllers\Api\UsersController::class,'show']);
Route::delete('/users/{id}', [App\Http\Controllers\Api\UsersController::class,'destroy']);

Route::get('/elections', [App\Http\Controllers\Api\ElectionsController::class,'index']);
Route::post('/elections', [App\Http\Controllers\Api\ElectionsController::class,'store']);
Route::get('/elections/{id}', [App\Http\Controllers\Api\ElectionsController::class,'show']);
Route::patch('/elections/{id}', [App\Http\Controllers\Api\ElectionsController::class,'update']);
Route::delete('/elections/{id}', [App\Http\Controllers\Api\ElectionsController::class,'delete']);

Route::get('/leaders', [App\Http\Controllers\Api\LeadersController::class,'index']);
Route::post('/leaders', [App\Http\Controllers\Api\LeadersController::class,'store']);
Route::get('/leaders/{id}', [App\Http\Controllers\Api\LeadersController::class,'show']);
Route::patch('/leaders/{id}', [App\Http\Controllers\Api\LeadersController::class,'update']);
Route::delete('/leaders{id}', [App\Http\Controllers\Api\LeadersController::class,'delete']);

Route::get('/participants', [App\Http\Controllers\Api\ParticipantsController::class,'index']);
Route::post('/participants', [App\Http\Controllers\Api\ParticipantsController::class,'store']);
Route::get('/participants/{id}', [App\Http\Controllers\Api\ParticipantsController::class,'show']);
Route::patch('/participants/{id}', [App\Http\Controllers\Api\ParticipantsController::class,'update']);
Route::delete('/participants/{id}', [App\Http\Controllers\Api\ParticipantsController::class,'delete']);

Route::get('/requests', [App\Http\Controllers\Api\RequestsController::class,'index']);
Route::post('/requests', [App\Http\Controllers\Api\RequestsController::class,'store']);
Route::get('/requests/{id}', [App\Http\Controllers\Api\RequestsController::class,'show']);
Route::patch('/requests/{id}', [App\Http\Controllers\Api\RequestsController::class,'update']);
Route::delete('/requests/{id}', [App\Http\Controllers\Api\RequestsController::class,'delete']);//an aspirant will be the one executing or even just an admin

Route::get('/votes/{election_id}', [App\Http\Controllers\Api\VotesController::class,'index']);
Route::post('/votes', [App\Http\Controllers\Api\VotesController::class,'store']);
Route::get('/votes/{election_id}/{participant_id}', [App\Http\Controllers\Api\VotesController::class,'show']);
Route::delete('/votes/{election_id}/{user_id}', [App\Http\Controllers\Api\VotesController::class,'delete']);//a voter will be the one executing this route

});



Route::post('/login', [App\Http\Controllers\Api\LoginController::class,'authenticateUser']);
