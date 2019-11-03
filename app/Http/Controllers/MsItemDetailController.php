<?php

namespace App\Http\Controllers;

use App\MsItemDetail;
use Illuminate\Http\Request;
use App\Http\Requests\MsItemDetailRequest;

class MsItemDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return MsItemDetail::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(MsItemDetailRequest $request)
    {
        $msItemDetail =  MsItemDetail::create($request->all());

        return response()->json([
            'content' => $msItemDetail,
            'action' => 'add', 
            'type' => 'success',
            'msg' => 'Success add ms item detail'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(MsItemDetailRequest $request, MsItemDetail $msItemDetail)
    {
        $msItemDetail->name = $request->name;
        $msItemDetail->update();

        return response()->json([
            'content' => $msItemDetail,
            'action' => 'edit', 
            'type' => 'success',
            'msg' => 'Success update ms item detail'
        ]);
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
