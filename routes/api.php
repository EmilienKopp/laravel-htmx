<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ElementsController;
use App\Http\Controllers\API\StatController;
use App\Http\Controllers\API\UserController;

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

Route::get('/demo', function() {
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://zenquotes.io?api=random&limit=1"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $quote = json_decode(curl_exec($ch))[0]; 
    curl_close($ch);
    return view('demo', [
        'quote' => $quote->h
    ]);
});


Route::controller(ElementsController::class)->group( function () {
    Route::get('/elements/forms/{type}', 'forms');
    Route::post('/elements/divs', 'divs');
});

Route::controller(StatController::class)->group( function () {
    Route::get('/stats', 'index');
    Route::put('/stats/{id}/update', 'update');
});

Route::controller(UserController::class)->group( function () {
    Route::get('/users', 'index');
    Route::put('/user/{id}/update', 'update');
});

Route::get('/clock', function() {
    return view('components.atoms.clock', [
        'time' => date('H:i'),
    ]);
});

Route::get('/quotes', function() {
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://zenquotes.io?api=random&limit=1"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $quote = json_decode(curl_exec($ch))[0]; 
    curl_close($ch);
    
    return view('components.atoms.quote', [
        'quote' => $quote->h
    ]);
});