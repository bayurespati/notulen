<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Companies::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        Companies::create($request->all());

        return response()->json('Success add company',200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Companies $company)
    {

        Companies::where('id', $company->id)
            ->update([
                'name'              => $request->name,
                'city'              => $request->city,
                'address'           => $request->address,
                'email'             => $request->email,
                'primary_contact'   => $request->primary_contact,
                'secondary_contact' => $request->secondary_contact
            ]);

        return response()->json('Success update company',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Companies $company)
    {   
        $company->delete();

        return response()->json('Success delete company',200);
    }
}
