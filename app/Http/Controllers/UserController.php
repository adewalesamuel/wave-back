<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUser as StoreUserRequest;
use App\Http\Requests\UpdateUser as UpdateUserRequest;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->orderBy('created_at', 'desc')->get();
        $data = [
            'success' => true,
            'data' => [
                'users' => $users
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
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = new User;

        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->tel = $data['tel'] ?? null;
        $user->email = $data['email'];
        $user->permissions = $data['permissisons'] ?? null;
        $user->password = $data['password'];
        $user->role_id = $data['role_id'];

        $user->save();
        
        $data = [
            'success' => true,
            'data' => [
                'user' => $user                
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->tel = $data['tel'] ?? null;
        $user->email = $data['email'];
        $user->permissions = $data['permissisons'] ?? null;
        $user->password = $data['password'];
        $user->role_id = $data['role_id'];

        $user->save();
        
        $data = [
            'success' => true,
            'data' => [
                'user' => $user                
                ]
            ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->email = $user->email . ".deactivated" . Str::random(10);

        $user->save();
        $user->delete();

        $data = [
            'success' => true,
            'data' => [
                'user' => $user
                ]
            ];
            
        return response()->json($data, 200);
    }
}
