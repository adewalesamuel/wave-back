<?php

namespace App\Http\Controllers;

use App\Models\Graph;
use App\Models\Indicator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGraph as StoreGraphRequest;
use App\Http\Requests\UpdateGraph as UpdateGraphRequest;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $graphs = Graph::where('project_id', $request->query('project_id'))
        ->orderBy('created_at', 'desc')->get();
        $indicator_ids = [];

        foreach ($graphs as  $graph) {
            $indicator_ids[] = json_decode($graph->indicators)[0];
        }

        $indicators = Indicator::whereIn('id', $indicator_ids)->with('collected_data')->get();

        for ($i=0; $i < count($graphs); $i++) { 
            for ($j=0; $j < count($indicators); $j++) { 
                if (intval(json_decode($graphs[$i]->indicators)[0]) === $indicators[$j]->id) {
                    $graphs[$i]['indicator'] = $indicators[$j];
                }
            }
        }

        $data = [
            "success" => true,
            "data" => [
                "graphs" => $graphs
                ]
            ];

        return response()->json($data);
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
    public function store(StoreGraphRequest $request)
    {
        $data = $request->validated();

        $graph = new Graph;
        
        $graph->name = $data['name'];
        $graph->description = $data['description'] ?? null;
        $graph->type = $data['type'];
        $graph->indicators = $data['indicators'];
        $graph->project_id = $data['project_id'];
        $graph->created_by = auth('api')->user()->id;
            
        $graph->save();

        $data = [
            'success' => true,
            'data' => [
                'graph' => $graph
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function show(Graph $graph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function edit(Graph $graph)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGraphRequest $request, Graph $graph)
    {
        $data = $request->validated();

        $graph->name = $data['name'];
        $graph->description = $data['description'] ?? null;
        $graph->type = $data['type'];
        $graph->indicators = $data['indicators'];
        $graph->project_id = $data['project_id'];
        $project->updated_by = auth('api')->user()->id;
            
        $graph->save();

        $data = [
            'success' => true,
            'data' => [
                'graph' => $graph
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph)
    {
        //
    }
}
