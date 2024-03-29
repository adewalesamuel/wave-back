<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\Permission as PermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        $data = [
            'success' => true,
            'data' => [
                'permissions' => $permissions
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
    public function store(PermissionRequest $request)
    {
        $data = $request->validated();
        
        if (Permission::where('slug', Str::slug($data['name']))->exists()) {
            $responseData = [
                "error" => true,
                "message" => "Permission already exists"
            ];

            return response()->json($responseData, 500);
        }

        $permission = new Permission;
        $permission->name = Str::ucfirst($data['name']);
        $permission->slug = Str::slug($data['name'],'-');

        $permission->save();

        $data = [
            'success' => true,
            'data' => [
                'permission' => $permission
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $data = $request->validated();
        
        $permission->name = Str::ucfirst($data['name']);
        $permission->slug = Str::slug($data['name']);

        $permission->save();

        $data = [
            'success' => true,
            'data' => [
                'permission' => $permission
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        $data = [
            'success' => true,
            'data' => [
                'permission' => $permission
                ]
            ];

        return response()->json($data, 200);
    }
}
