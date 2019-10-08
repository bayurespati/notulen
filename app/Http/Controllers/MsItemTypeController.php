<?php

namespace App\Http\Controllers;

use App\MsItemType;
use Illuminate\Http\Request;

class MsItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return MsItemType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        MsItemType::create($request->all());

        return response()->json('Success add ms item type',200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, MsItemType $msItemType)
    {
        MsItemType::where('id', $msItemType->id)
            ->update([
                'code' => $request->code,
                'name' => $request->name
            ]);

        return response()->json('Success update ms item type',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MsItemType $msItemType)
    {
        $msItemType->delete();

        return response()->json('Success delete company',200);
    }
}
