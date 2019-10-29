<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Meeting::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(MeetingRequest $request)
    {
        Meeting::create($request->all());

        return response()->json('Success add meeting',200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(MeetingRequest $request, Meeting $meeting)
    {
        Meeting::where('id', $meeting->id)
            ->update([
                'general_note'  => $request->general_note,
                'planned_date'  => $request->planned_date,
                'actual_date'   => $request->actual_date,
                'project_id'    => $request->project_id
                'title'         => $request->title,
            ]);

        return response()->json('Success update meeting',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return response()->json('Success delete meeting',200);
    }
}
