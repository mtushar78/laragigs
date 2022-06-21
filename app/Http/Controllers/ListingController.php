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
//        dd($request->file('logo'));
        $formFields = $request->validate([
          "company" => ["required",Rule::unique("listings", "company")],
          "title" => "required",
          "location" => "required",
          "email" => ["required","email"],
          "website" => "required",
          "tags" => "required",
          "description" =>"required",
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        Listings::create($formFields);
        return redirect("/")->with('message', 'New List created Successfully!');
    }

    public function edit(Listings $listing){
        return view('Listings.edit',[
            "listing" => $listing,
        ]);
    }

    public function update(Request $request, Listings $listing )
    {
//        dd($request->file('logo'));
        $formFields = $request->validate([
          "company" => ["required"],
          "title" => "required",
          "location" => "required",
          "email" => ["required","email"],
          "website" => "required",
          "tags" => "required",
          "description" =>"required",
        ]);
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Gig updated Successfully!');
    }

}
