<?php

use Illuminate\Support\Facades\Route;
use PSystem\Http\Controllers\MotorController;
use PSystem\Http\Controllers\CarController;
use PSystem\Http\Controllers\AdminController;


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

Route::get('/', [AdminController::class, 'login']);

Route::post('/auth', [AdminController::class, 'auth']);


Route::middleware(['admin'])->group(function (){

    Route::get('/logout', [AdminController::class, 'logout']);

    
    Route::get('/index', function(){
    return view('options.index');
    });

    Route::get('/log', [AdminController::class, 'logAccess']);

    Route::get('/indexCar', [CarController::class, 'indexCar']);
    Route::get('/indexMotor', [MotorController::class, 'indexMotor']);
    
    
    Route::get('/register/car', [CarController::class, 'createCar']);
    Route::get('/register/motorcycle', [MotorController::class, 'createMotor']);
    
    Route::post('/register/car/store', [CarController::class, 'carStore']);
    Route::post('/register/motorcycle/store', [MotorController::class, 'motorStore']);
    
    Route::get('/show/car/{id}', [CarController::class, 'showCar']);
    Route::get('/show/motorcycle/{id}', [MotorController::class, 'showMotor']);
    
    Route::get('/search/car', [CarController::class, 'searchCar']);
    Route::get('/search/motorcycle', [MotorController::class, 'searchMotor']);

});



