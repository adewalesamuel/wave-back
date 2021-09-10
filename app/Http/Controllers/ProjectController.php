<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProject as StoreProjectRequest;
use App\Http\Requests\UpdateProject as UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'projects' => $projects
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $project = new Project;
        
        $project->name = $data['name'];
        $project->description = $data['description'] ?? null;
        $project->countries = $data['countries'] ?? null;
        $project->status = $data['status'] ?? 'open';
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->created_by = auth('api')->user()->id;
            
        $project->save();

        $data = [
            'success' => true,
            'data' => [
                'project' => $project
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        
        $project->name = $data['name'];
        $project->description = $data['description'] ?? null;
        $project->countries = $data['countries'] ?? null;
        $project->status = $data['status'] ?? 'open';
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->updated_by = auth('api')->user()->id;
            
        $project->save();

        $data = [
            'success' => true,
            'data' => [
                'project' => $project
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        $data = [
             'success' => true,
             'data' => [
                    'project' => $project
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
