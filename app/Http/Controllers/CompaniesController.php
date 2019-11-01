<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;

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
    public function store(CompanyRequest $request)
    {
        Companies::create($request->all());

        return response()->json('Success add company',200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(CompanyRequest $request, Companies $company)
    {

        Companies::where('id', $company->id)
            ->update([
                'secondary_contact' => $request->secondary_contact,
                'primary_contact'   => $request->primary_contact,
                'address'           => $request->address,
                'email'             => $request->email,
                'name'              => $request->name,
                'city'              => $request->city,
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
