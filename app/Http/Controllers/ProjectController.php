<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Project::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Project::create($request->all());

        return response()->json('Success add project',200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        Project::where('id', $project->id)->update([
            'code'    => $request->code,
            'name'    => $request->name,
            'address' => $request->address
        ]);

        return response()->json('Success edit project',200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();        

        return response()->json('Success delete project',200);
    }
}
