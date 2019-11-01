<?php

namespace App\Http\Controllers;

use App\MsItem;
use Illuminate\Http\Request;
use App\Http\Requests\MsItemRequest;

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
    public function store(MsItemRequest $request)
    {
        MsItem::create($request->all());

        return response()->json('Success add ms item', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(MsItemRequest $request, MsItem $msItem)
    {
        MsItem::where('id', $msItem->id)
            ->update([
                'alternative_name' => $request->alternative_name,
                'ms_item_type_id'  => $request->ms_item_type_id,
                'name'             => $request->name,
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
