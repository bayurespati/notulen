<?php

namespace App\Http\Controllers;

use App\MsItem;
use Illuminate\Http\Request;

class MsItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return MsItem::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        MsItem::create($request->all());

        return response()->json('Success add ms item', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, MsItem $msItem)
    {
        MsItem::where('id', $msItem->id)
            ->update([
                'name'             => $request->name,
                'ms_item_type_id'  => $request->ms_item_type_id,
                'alternative_name' => $request->alternative_name,
                'code'             => $request->code,
            ]);

        return response()->json('Success update ms item', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(MsItem $msItem)
    {
        $msItem->delete();

        return response()->json('Success delete ms item', 200);
    }
}
