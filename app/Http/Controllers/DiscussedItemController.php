<?php

namespace App\Http\Controllers;

use App\DiscussedItem;
use Illuminate\Http\Request;

class DiscussedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return DiscussedItem::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        DiscussedItem::create($request->all());

        return response()->json('Success add discussed item', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, DiscussedItem $discussedItem)
    {
        DiscussedItem::where('id', $discussedItem->id)
            ->update([
                'item_id'      => $request->item_id,
                'meeting_id'   => $request->meeting_id,
                'qty'          => $request->qty,
                'diameter'     => $request->diameter,
                'dimension'    => $request->dimension,
                'width'        => $request->width,
                'height'       => $request->height,
                'general_note' => $request->general_note
            ]);

        return response()->json('Success edit discussed item', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(DiscussedItem $discussedItem)
    {
        $discussedItem->delete();

        return response()->json('Success delete discussed item', 200);
    }
}
