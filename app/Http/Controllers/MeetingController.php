<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Meeting::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Meeting::create($request->all());

        return response()->json('Success add meeting',200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        Meeting::where('id', $meeting->id)
            ->update([
                'title'        => $request->title,
                'planned_date'  => $request->planned_date,
                'actual_date'  => $request->actual_date,
                'general_note' => $request->general_note,
                'project_id'   => $request->project_id
            ]);

        return response()->json('Success update meeting',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return response()->json('Success delete meeting',200);
    }
}
