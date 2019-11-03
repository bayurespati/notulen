<?php

namespace App\Http\Controllers;

use App\MsRoom;
use Illuminate\Http\Request;
use App\Http\Requests\MsRoomRequest;

class MsRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return MsRoom::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(MsRoomRequest $request)
    {
        $data = MsRoom::create($request->all());

        return response()->json([
            'content' => $data, 
            'action' => 'add', 
            'type' => 'success',
            'msg' => 'Success add room'
        ]);
    }

    /**
     * Display the specified resource.
     *
     */
    public function update(MsRoomRequest $request, MsRoom $msRoom)
    {
        $msRoom->name = $request->name;
        $msRoom->code = $request->code;
        $msRoom->update();

        return response()->json([
            'content' => $msRoom, 
            'action' => 'edit', 
            'type' => 'success',
            'msg' => 'Success update room'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MsRoom $msRoom)
    {
        $msRoom->delete();

        return response()->json('Success delete room',200);
    }
}
