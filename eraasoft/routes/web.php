<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\listing;

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

// Listing Module

// all list

Route::get('/', [ListingController::class, 'index']);


// Create a listing form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing
Route::post('/', [ListingController::class, 'store'])->middleware('auth');;

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');;

// Update listing
Route::post('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');;

//Delete Listing
Route::get('/listings/{listing}/delete', [ListingController::class, 'delete'])->middleware('auth');;

// single list
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// users Module

// Register
Route::get('/register', [UserController::class, 'register'])->middleware('guest');;

// doRegister
Route::post('/doRegister', [UserController::class, 'doRegister']);

//Login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');;

//doLogin
Route::post('/users', [UserController::class, 'doLogin']);

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');;







// Route::get('/search', function(Request $request){
//     return 'hello my name is ' . $request->name . ' and iam from ' . $request->city;
// });
