<?php

namespace App\Http\Controllers;

use App\Models\CollectedData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCollectedData as StoreCollectedDataRequest;
use App\Http\Requests\UpdateCollectedData as UpdateCollectedDataRequest;

class CollectedDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collected_datas = CollectedData::orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'collected_datas' => $collected_datas
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
    public function store(StoreCollectedDataRequest $request)
    {   
        $data = $request->validated();

        $collected_data = new CollectedData;
        
        $collected_data->values = $data['values'];
        $collected_data->notes = $data['notes'] ?? null;
        $collected_data->collection_date = $data['collection_date'];
        $collected_data->budget = $data['budget'] ?? null;
        $collected_data->amount_spent = $data['amount_spent'] ?? null;
        $collected_data->file_name = $data['file_name'] ?? null;    
        $collected_data->disaggregation_values = $data['disaggregation_values'] ?? null;
        $collected_data->created_by = auth('api')->user()->id;
        $collected_data->indicator_id = $data['indicator_id'] ?? null;
        $collected_data->files_urls = $data['files_urls'] ?? null;

        $collected_data->save();

        $data = [
            'success' => true,
            'data' => [
                'collected_data' => $collected_data
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CollectedData  $collectedData
     * @return \Illuminate\Http\Response
     */
    public function show(CollectedData $collectedData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollectedData  $collectedData
     * @return \Illuminate\Http\Response
     */
    public function edit(CollectedData $collectedData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollectedData  $collectedData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCollectedDataRequest $request, CollectedData $collected_data)
    {   
        $data = $request->validated();
        
        $collected_data->values = $data['values'];
        $collected_data->notes = $data['notes'] ?? null;
        $collected_data->collection_date = $data['collection_date'];
        $collected_data->budget = $data['budget'] ?? null;
        $collected_data->amount_spent = $data['amount_spent'] ?? null;
        $collected_data->file_name = $data['file_name'] ?? null;    
        $collected_data->disaggregation_values = $data['disaggregation_values'] ?? null;
        $collected_data->created_by = auth('api')->user()->id;
        $collected_data->indicator_id = $data['indicator_id'] ?? null;
        $collected_data->files_urls = $data['files_urls'] ?? null;

        $collected_data->save();

        $data = [
            'success' => true,
            'data' => [
                'collected_data' => $collected_data
                ]
            ];

        return response()->json($data, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollectedData  $collectedData
     * @return \Illuminate\Http\Response
     */
    public function destroy(CollectedData $collected_data)
    {
        $collected_data->delete();

        $data = [
             'success' => true,
             'data' => [
                    'collected_data' => $collected_data
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
