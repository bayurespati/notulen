<?php

namespace App\Http\Controllers;

use App\MsItemDetail;
use Illuminate\Http\Request;

class MsItemDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MsItemDetail::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        MsItemDetail::create($request->all());

        return response()->json('Success add ms item detail', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, MsItemDetail $msItemDetail)
    {
        MsItemDetail::where('id', $msItemDetail->id)
            ->update([
                'name' => $request->name,
            ]);

        return response()->json('Success update ms item detail', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MsItemDetail $msItemDetail)
    {
        $msItemDetail->delete();

        return response()->json('Success delete ms item detail', 200);
    }
}
