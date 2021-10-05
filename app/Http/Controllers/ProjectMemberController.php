<?php

namespace App\Http\Controllers;

use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectMember as StoreProjectMemberRequest;

class ProjectMemberController extends Controller
{
    public function store(StoreProjectMemberRequest $request) {
        $data = $request->validated();

        if (ProjectMember::where('project_id', $data['project_id'])->where('user_id', $data['user_id'])->exists())
            throw new \Exception("The project member already exist", 1);
            
        $project_member = new ProjectMember;
        
        $project_member->project_id = $data['project_id'] ?? null;
        $project_member->user_id = $data['user_id'] ?? null;
        $project_member->created_by = auth('api')->user()->id;
            
        $project_member->save();

        $data = [
            'success' => true,
            'data' => [
                'project_member' => $project_member,
                'user' => User::where('id', $data['user_id'])->first()
                ]
            ];

        return response()->json($data, 200);
    }

    public function destroy(ProjectMember $project_member) {
        $project_member->delete();

        $data = [
             'success' => true,
             'data' => [
                    'project_member' => $project_member
                 ]
             ];
             
         return response()->json($data, 200);
    }
}
