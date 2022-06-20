<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;

class ListingController extends Controller
{

    public function index(){
//        dd(request()->tags);
        return view('Listing.index',[
            "listings" => Listings::latest()->filter(request(['tags']))->get(),
        ]);
    }
    public function show(Listings $listing){
        return view('Listing.show',[
            "listing" => $listing,
        ]);
    }

}
