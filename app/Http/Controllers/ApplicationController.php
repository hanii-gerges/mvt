<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return ApplicationResource::collection($applications);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fullname' => 'required',
            'birthdate' => 'required|date',
            'nationality' => 'required',
            'email' => 'required|email|unique:email',
            'phone' => 'required',
            'about' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()],400);
        }

        $application = Application::create([
            'name_arabic' => $request->fullname,
            'birthdate' => $request->birthdate,
            'nationality' => $request->nationality,
            'email' => $request->email,
            'phone' => $request->phone,
            'any_ideas' => $request->about,
        ]);

        return response()->json(['status'=>'ok']);
    }
}
