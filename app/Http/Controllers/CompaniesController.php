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
        $company = Companies::create($request->all());

        return response()->json([
            'content' => $company,
            'action' => 'add',
            'type' => 'success',
            'msg' => 'Success add company'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(CompanyRequest $request, Companies $company)
    {
        $company->secondary_contact = $request->secondary_contact;
        $company->primary_contact = $request->primary_contact;
        $company->address = $request->address;
        $company->email = $request->email;
        $company->name = $request->name;
        $company->city = $request->city;
        $company->update();

        return response()->json([
            'content' => $company, 
            'action' => 'edit', 
            'type' => 'success',
            'msg' => 'Success update company'
        ]);
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
