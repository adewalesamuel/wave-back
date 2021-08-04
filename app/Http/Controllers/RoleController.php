<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\Role as RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
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
    public function store(RoleRequest $request)
    {
        $data = $request->validated();
        
        if (Role::where('slug', Str::slug($data['name']))->exists()) {
            $responseData = [
                "error" => true,
                "message" => "Role already exists"
            ];

            return response()->json($responseData, 500);
        }

        $role = new Role;
        $role->name = Str::ucfirst($data['name']);
        $role->slug = Str::slug($data['name'],'-');
        $role->permissions = $data['permissions'];

        $role->save();

        return response()->json(['success' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Request $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->validated();
        
        $role->name = Str::ucfirst($data['name']);
        $role->slug = Str::slug($data['name']);
        $role->permissions = $data['permissions'];

        $role->save();

        return response()->json(['success' => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
