<?php

use App\Http\Controllers\ListingController;
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

// all list

Route::get('/', [ListingController::class, 'index']);


// Create a listing form
Route::get('/listings/create', [ListingController::class, 'create']);

// Store listing
Route::post('/listings', [ListingController::class, 'store']);





// single list
Route::get('/listings/{listing}', [ListingController::class, 'show']);










// Route::get('/search', function(Request $request){
//     return 'hello my name is ' . $request->name . ' and iam from ' . $request->city;
// });
