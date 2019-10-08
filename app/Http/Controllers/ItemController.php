<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return Item::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        Item::create($request->all());

        return response()->json('Success add item', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, Item $item)
    {
        Item::where('id', $item->id)
            ->update([
                'ms_item_id' => $request->ms_item_id,
                'project_id' => $request->project_id
            ]);

        return response()->json('Success update item', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json('Success delete item', 200);
    }
}
