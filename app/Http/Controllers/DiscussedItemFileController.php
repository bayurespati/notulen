<?php

namespace App\Http\Controllers;

use App\DiscussedItemFile;
use Illuminate\Http\Request;

class DiscussedItemFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return DiscussedItemFile::all();
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

        $discuessedItemFile = new DiscussedItemFile();
        $discuessedItemFile->name = $name;
        $discuessedItemFile->path = $path;
        $discuessedItemFile->discussed_item_id = $request->discussed_item_id;
        $discuessedItemFile->file_extension = $file_extension;
        $discuessedItemFile->save();

        return response()->json('Success add discussed item file', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, DiscussedItemFile $discussedItemFile)
    {
        $name = "update_temp_name";
        $path = "update_temp_path";
        $file_extension = "update_temp_extension";

        $discussedItemFile->name = $name;
        $discussedItemFile->path = $path;
        $discussedItemFile->discussed_item_id = $request->discussed_item_id;
        $discussedItemFile->file_extension = $file_extension;
        $discussedItemFile->update();

        return response()->json('Success update discussed item file', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(DiscussedItemFile $discussedItemFile)
    {
        $discussedItemFile->delete();

        return response()->json('Success delete discussed item file',200);
    }
}
