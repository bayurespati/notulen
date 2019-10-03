<?php

namespace App\Http\Controllers;

use App\MsRoom;
use Illuminate\Http\Request;

class MsRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MsRoom::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MsRoom::create($request->all());

        return response()->json('Success add room', 200);
    }

    /**
     * Display the specified resource.
     */
    public function update(Request $request, MsRoom $msRoom)
    {
        MsRoom::where('id', $msRoom->id)
            ->update([
                'code' => $request->code,
                'name' => $request->name,
            ]);

        return response()->json('Success update room',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MsRoom $msRoom)
    {
        $msRoom->delete();

        return response()->json('Success delete room',200);
    }
}
