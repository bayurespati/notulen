<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Room::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->ms_rooms as $ms_room) {
            $room = new Room();
            $room->project_id = $request->project_id;
            $room->ms_room_id = (int) $ms_room;
            $room->save();
        }

        return response()->json('Success add room', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        Room::where('id', $room->id)
            ->update([
                'project_id' => $request->project_id,
                'ms_room_id' => $request->ms_room_id,
            ]);

        return response()->json('Success update room',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return response()->json('Success delete room',200);
    }
}
