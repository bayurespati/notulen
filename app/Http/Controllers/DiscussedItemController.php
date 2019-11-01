<?php

namespace App\Http\Controllers;

use App\DiscussedItem;
use Illuminate\Http\Request;
use App\Http\Requests\DiscussedItemRequest;

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
    public function store(DiscussedItemRequest $request)
    {
        DiscussedItem::create($request->all());

        return response()->json('Success add discussed item', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(DiscussedItemRequest $request, DiscussedItem $discussedItem)
    {
        DiscussedItem::where('id', $discussedItem->id)
            ->update([
                'general_note' => $request->general_note
                'meeting_id'   => $request->meeting_id,
                'dimension'    => $request->dimension,
                'diameter'     => $request->diameter,
                'item_id'      => $request->item_id,
                'height'       => $request->height,
                'width'        => $request->width,
                'qty'          => $request->qty,
                
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
