<?php

namespace App\Http\Controllers;

use App\MsDescriptiveFinishing;
use Illuminate\Http\Request;
use App\Http\Requests\MsDescriptiveFinishingRequest;

class MsDescriptiveFinishingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return MsDescriptiveFinishing::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(MsDescriptiveFinishingRequest $request)
    {
        $msDescriptiveFinishing = MsDescriptiveFinishing::create($request->all());

        return response()->json([
            'content' => $msDescriptiveFinishing,
            'action' => 'add',
            'type' => 'success',
            'msg' => 'Success add descriptive finishing'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(MsDescriptiveFinishingRequest $request, MsDescriptiveFinishing $msDescriptiveFinishing)
    {
        $msDescriptiveFinishing->name = $request->name;
        $msDescriptiveFinishing->update();

        return response()->json([
            'content' => $msDescriptiveFinishing,
            'action' => 'edit',
            'type' => 'success',
            'msg' => 'Success edit descriptive finishing'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MsDescriptiveFinishing $msDescriptiveFinishing)
    {
        $msDescriptiveFinishing->delete();

        return response()->json('Success delete descriptive finishing',200);
    }
}
