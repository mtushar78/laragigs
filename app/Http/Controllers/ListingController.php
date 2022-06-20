<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    public function index()
    {
//        dd(request()->tags);
        return view('Listings.index', [
            "listings" => Listings::latest()->filter(request(['tags', 'search']))->paginate(4),
        ]);
    }

    public function show(Listings $listing)
    {
        return view('Listings.show', [
            "listing" => $listing,
        ]);
    }

    //show create form
    public function create()
    {
        return view('Listings.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $formValidate = $request->validate([
          "company" => ["required",Rule::unique("listings", "company")],
          "title" => "required",
          "location" => "required",
          "email" => ["required","email"],
          "website" => "required",
          "tags" => "required",
          "description" =>"required",
        ]);
        Listings::create($formValidate);
        return redirect("/")->with('message', 'New List created Successfully!');
    }

}
