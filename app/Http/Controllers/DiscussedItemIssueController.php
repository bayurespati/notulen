<?php

namespace App\Http\Controllers;

use App\DiscussedItemIssue;
use Illuminate\Http\Request;

class DiscussedItemIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return DiscussedItemIssue::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {

        DiscussedItemIssue::create($request->all());

        return response()->json('Success add discussed item issue', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, DiscussedItemIssue $discussedItemIssue)
    {
        DiscussedItemIssue::where('id', $discussedItemIssue->id)
            ->update([
                'discussed_item_id' => $request->discussed_item_id,
                'title'             => $request->title,
                'details'           => $request->details,
                'solution'          => $request->solution
            ]);

        return response()->json('Success edit discussed item issue', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(DiscussedItemIssue $discussedItemIssue)
    {
        $discussedItemIssue->delete();

        return response()->json('Success delete discussed item issue', 200);
    }
}
