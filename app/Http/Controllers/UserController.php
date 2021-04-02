<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Branch;
use App\Models\Section;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        //sql injection ?!!!!!
        if(request('branch') && request('section'))
        {
            $users=User::join('branches','users.branch_id','=','branches.id')
                    ->join('sections','users.section_id','=','sections.id')
                    ->where('branches.name',request('branch'))
                    ->where('sections.name',request('section'))
                    ->select('users.*') // to prevent attribute truncation..users.id sections.id
                    ->get();
            // you can use join with closure and constraints inside it ($join->on())
            
        }
        else if(request('branch'))
        {
            $branch=Branch::where('name',request('branch'))->first();
            if(!$branch)
            {
                return response()->json(['status'=>'No branch found with this name'],404);
            }
            $users=$branch->users;
        }
        else if(request('section'))
        {
            $section=Section::where('name',request('section'))->first();
            if(!$section)
            {
                return response()->json(['status'=>'No section found with this name'],404);
            }
            $users=$section->users;
        }
        else $users=User::all();
        
        return UserResource::collection($users);
    }

    public function show($id)
    {
        if(!$user=User::find($id))
        {
            return response()->json(['status'=>'No users found with this id'],404);
        }
        return new UserResource($user);
    }

    public function update(Request $request, $id)
    {
        if(!$user=User::find($id))
        {
            return response()->json(['status'=>'No users found with this id'],404);
        }
        
        $user->update([
            'bio' => $request->bio,
        ]);

        if($request->file('image'))
        $user->addMedia($request->file('image'))->toMediaCollection();

        return response()->json(['status'=>'ok']);
    }

}
