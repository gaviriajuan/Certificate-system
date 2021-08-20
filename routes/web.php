<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TypesCertificatescontroller;
Use App\Http\Controllers\TypesContractController;
Use App\Http\Controllers\CjCompensationController;
Use App\Http\Controllers\EpsController;
Use App\Http\Controllers\ChargesControlle;
Use App\Http\Controllers\ArlsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta Types Certificates

Route::get('/api/tcerti/index', [TypesCertificatesController::class, 'index']);
Route::get('/api/tcerti/getData', [TypesCertificatesController::class, 'getData']);
Route::post('/api/tcerti/store', [TypesCertificatesController::class, 'store']);
Route::put('/api/tcerti/update', [TypesCertificatesController::class, 'update']);
Route::delete('/api/tcerti/delete', [TypesCertificatesController::class, 'destroy']);

//Ruta Types contracts

Route::get('/api/tcontract/index', [TypesContractController::class, 'index']);
Route::get('/api/tcontract/getData', [TypesContractController::class, 'getData']);
Route::post('/api/tcontract/store', [TypesContractController::class, 'store']);
Route::put('/api/tcontract/update', [TypesContractController::class, 'update']);
Route::delete('/api/tcontract/delete', [TypesContractController::class, 'destroy']);

// Ruta Cj Compensación

Route::get('/api/cjcompen/index', [CjCompensationController::class, 'index']);
Route::get('/api/cjcompen/getData', [CjCompensationController::class, 'getData']);
Route::post('/api/cjcompen/store', [CjCompensationController::class, 'store']);
Route::put('/api/cjcompen/update', [CjCompensationController::class, 'update']);
Route::delete('/api/cjcompen/delete', [CjCompensationController::class, 'destroy']);

// Ruta Eps

Route::get('/api/salud/index', [EpsController::class, 'index']);
Route::get('/api/salud/getData', [EpsController::class, 'getData']);
Route::post('/api/salud/store', [EpsController::class, 'store']);
Route::put('/api/salud/update', [EpsController::class, 'update']);
Route::delete('/api/salud/delete', [EpsController::class, 'destroy']);

// Ruta Charges

Route::get('/api/cargo/index', [ChargesControlle::class, 'index']);
Route::get('/api/cargo/getData', [ChargesControlle::class, 'getData']);
Route::post('/api/cargo/store', [ChargesControlle::class, 'store']);
Route::put('/api/cargo/update', [ChargesControlle::class, 'update']);
Route::delete('/api/cargo/delete', [ChargesControlle::class, 'destroy']);

//Ruta Arls

Route::get('/api/auxilio/index', [ArlsController::class, 'index']);
Route::get('/api/auxilio/getData', [ArlsController::class, 'getData']);
Route::post('/api/auxilio/store', [ArlsController::class, 'store']);
Route::put('/api/auxilio/update', [ArlsController::class, 'update']);
Route::delete('/api/auxilio/delete', [ArlsController::class, 'destroy']);