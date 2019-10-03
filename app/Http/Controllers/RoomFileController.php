<?php

namespace App\Http\Controllers;

use App\RoomFile;
use Illuminate\Http\Request;

class RoomFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return RoomFile::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $name = "temp_name";
        $path = "temp_path";
        $file_extension = "temp_extension";

        $roomFile = new RoomFile();
        $roomFile->name = $name;
        $roomFile->path = $path;
        $roomFile->room_id = $request->room_id;
        $roomFile->file_extension = $file_extension;
        $roomFile->save();

        return response()->json('Success add room file', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, RoomFile $roomFile)
    {
        $name = "update_temp_name";
        $path = "update_temp_path";
        $file_extension = "update_temp_extension";

        $roomFile->name = $name;
        $roomFile->path = $path;
        $roomFile->room_id = $request->room_id;
        $roomFile->file_extension = $file_extension;
        $roomFile->update();

        return response()->json('Success update room file', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(RoomFile $roomFile)
    {
        $roomFile->delete();

        return response()->json('Success delete room file',200);
    }
}
