<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculatorController;
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

// redirect to the view
Route::get('/',[CalculatorController::class, 'index']);
// post route to calculate the volume
Route::post('/calculate-volumetric-weight', [CalculatorController::class, 'calculate']);

