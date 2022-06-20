<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;

class ListingController extends Controller
{

    public function index(){
        return view('Listing.index',[
            "listings" => Listings::all(),
        ]);    
    }
    public function show(Listings $listing){
        return view('Listing.show',[
            "listing" => $listing,
        ]);
    }
    
}
