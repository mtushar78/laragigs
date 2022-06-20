<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Listings;
use \App\Http\Controllers\ListingController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function (){
   return response('<h1>Hello World</h1>');
});
Route::get('/listings', [ListingController::class, 'index']);
//Route::get('/listing/{id}', function ($id){
//    $listing = Listings::find($id);
//    if($listing){
//        return view('listing',[
//            "listing" => Listings::find($id),
//        ]);
//    }else{
//        abort(404);
//    }
//});
Route::get('/listing/{listing}', [ListingController::class, 'show']);

