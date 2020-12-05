<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::user()->cant('create',Answer::class))
        return response()->json(['status'=>'Unauthorized'],403);

        $validator = Validator::make($request->all(),[
            'question_id' => 'required|exists:questions,id',
            'body' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        Answer::create([
            'question_id' => $request->question_id,
            'user_id' => Auth::user()->id,
            'body' => $request->body,
        ]);

        return response()->json(['status'=>'ok']);
    }

    public function update($id)
    {
        
    }
}
