<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\TypesCertificatescontroller;
Use App\Http\Controllers\TypesContractController;
Use App\Http\Controllers\CjCompensationController;
Use App\Http\Controllers\EpsController;
Use App\Http\Controllers\ChargesController;
Use App\Http\Controllers\ArlsController;
Use App\Http\Controllers\OfficialController;
use Inertia\Inertia;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//Ruta Types Certificates
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tcerti/index', [TypesCertificatesController::class, 'index'])->name('Tipos de certificado');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tcerti/registrar', [TypesCertificatesController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/tcerti/actualizar', [TypesCertificatesController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tcerti/eliminar', [TypesCertificatesController::class, 'destroy']);

//Ruta Types contracts
Route::middleware(['auth:sanctum', 'verified'])->get('/api/tcontract/index', [TypesContractController::class, 'index'])->name('Tipos de contrato');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tcontract/registrar', [TypesContractController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/tcontract/actualizar', [TypesContractController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/tcontract/eliminar', [TypesContractController::class, 'destroy']);

// Ruta Cj Compensación
Route::middleware(['auth:sanctum', 'verified'])->get('/api/cjcompen/index', [CjCompensationController::class, 'index'])->name('CajaCompensacion');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/cjcompen/registrar', [CjCompensationController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/cjcompen/actualizar', [CjCompensationController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/cjcompen/eliminar', [CjCompensationController::class, 'destroy']);

// Ruta Eps
Route::middleware(['auth:sanctum', 'verified'])->get('/api/salud/index', [EpsController::class, 'index'])->name('EPS');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/salud/registrar', [EpsController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/salud/actualizar', [EpsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/salud/eliminar', [EpsController::class, 'destroy']);

// Ruta Charges
Route::middleware(['auth:sanctum', 'verified'])->get('/api/cargo/index', [ChargesController::class, 'index'])->name('Cargos');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/cargo/registrar', [ChargesController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/cargo/actualizar', [ChargesController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/cargo/eliminar', [ChargesController::class, 'destroy']);

//Ruta Arls
Route::middleware(['auth:sanctum', 'verified'])->get('/api/auxilio/index', [ArlsController::class, 'index'])->name('ARL');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/auxilio/registrar', [ArlsController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/auxilio/actualizar', [ArlsController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/auxilio/eliminar', [ArlsController::class, 'destroy']);

//Ruta official
Route::middleware(['auth:sanctum', 'verified'])->get('/api/offi/index', [OfficialController::class, 'index'])->name('Oficial');
Route::middleware(['auth:sanctum', 'verified'])->post('/api/offi/registrar', [OfficialController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->put('/api/offi/actualizar', [OfficialController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->post('/api/offi/eliminar', [OfficialController::class, 'destroy']);