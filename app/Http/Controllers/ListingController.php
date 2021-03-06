<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listings;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    public function index()
    {
        // dd(session());
        return view('listings.index', [
            "listings" => Listings::latest()->filter(request(['tags', 'search']))->paginate(4),
        ]);
    }

    public function show(Listings $listing)
    {
        return view('listings.show', [
            "listing" => $listing,
        ]);
    }

    //show create form
    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    { //        dd($request->file('logo'));
        $formFields = $request->validate([
            "company" => ["required", Rule::unique("listings", "company")],
            "title" => "required",
            "location" => "required",
            "email" => ["required", "email"],
            "website" => "required",
            "tags" => "required",
            "description" => "required",
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Listings::create($formFields);
        return redirect("/")->with('message', 'New List created Successfully!');
    }

    public function edit(Listings $listing)
    {
        return view('listings.edit', [
            "listing" => $listing,
        ]);
    }

    public function update(Request $request, Listings $listing)
    { //        dd($request->file('logo'));
        //make sure the owner can update only
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorized access');
        }

        $formFields = $request->validate([
            "company" => ["required"],
            "title" => "required",
            "location" => "required",
            "email" => ["required", "email"],
            "website" => "required",
            "tags" => "required",
            "description" => "required",
        ]);
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        $listing->update($formFields);
        return back()->with('message', 'Gig updated Successfully!');
    }

    public function destroy(Listings $listing)
    {
        if($listing->user_id != auth()->id()){
            abort('403', 'Unauthorized access');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Gig Deleted Successfully!');
    }
    public function manage(){
        return view('listings.manage',["listings"=>auth()->user()->listings()->get()]);
    }

}
