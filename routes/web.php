<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Listings;
use \App\Http\Controllers\ListingController;
use \App\Http\Controllers\UserController;
use App\Models\User;
/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing

Route::get('/', [ListingController::class, 'index']);
//Route::get('/listing/{id}', function ($id){
//    $listing = listings::find($id);
//    if($listing){
//        return view('listing',[
//            "listing" => listings::find($id),
//        ]);
//    }else{
//        abort(404);
//    }
//});


// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// Show a manage listing
Route::get('/listings/manage', [ListingController::class, 'manage']);
// Show a single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
// Create a single listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
// show update form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware('auth');
// Store the update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
// Destroy a listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
//Show register/ create user form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// store new user
Route::post('/users', [UserController::class, 'store']);
// logout User
Route::post('/logout', [UserController::class, 'logout']);
// User login
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');
// Login submit form
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
