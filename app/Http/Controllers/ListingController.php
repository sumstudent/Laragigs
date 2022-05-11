<?php

namespace App\Http\Controllers;

use id;
use auth;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all listings
    public function index(Request $request)
    {
        // dd($request);
        return view("listings.index", [
            "listings" => Listing::latest()
                ->filter(request(["tag", "search", "order"]))
                ->simplepaginate(3),
        ]);
    }

    //Show singline listing
    public function show(Listing $listing)
    {
        return view("listings.show", [
            "listing" => $listing,
        ]);
    }

    //Show create form
    public function create()
    {
        return view("listings.create");
    }

    //Store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "title" => "required",
            "tags" => "required",
            "company" => ["required", Rule::unique("listings", "company")],
            "location" => "required",
            "email" => ["required", "email"],
            "website" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile("logo")) {
            $formFields["logo"] = $request
                ->file("logo")
                ->store("logos", "public");
        }

        $formFields["user_id"] = auth()->id();

        Listing::create($formFields);

        return redirect("/")->with("message", "Listing Create Successfully!");
    }
    //Show Edit(Update) Form
    public function edit(Listing $listing)
    {
        return view("listings.edit", ["listing" => $listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // Makes sure logged in user is the owmer
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorized Action");
        }

        $formFields = $request->validate([
            "title" => "required",
            "tags" => "required",
            "company" => ["required"],
            "location" => "required",
            "email" => ["required", "email"],
            "website" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile("logo")) {
            $formFields["logo"] = $request
                ->file("logo")
                ->store("logos", "public");
        }

        $listing->update($formFields);

        return back()->with("message", "Listing Updated Successfully!");
    }

    //Delete listing Data
    public function delete(Listing $listing)
    {
        // Makes sure logged in user is the owmer
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorized Action");
        }
        $listing->delete();
        return redirect("/")->with("message", "Listing Deleted Successfully");
    }

    //Manage Listing
    public function manage(Request $request)
    {
        return view("listings.manage", [
            "listings" => auth()
                ->user()
                ->listings()
                ->get(),
        ]);
    }
}
