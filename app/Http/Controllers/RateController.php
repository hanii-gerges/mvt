<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    public function addRate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id' => 'required|exists:users',
            'rate' => 'required|integer|between:1,10',
            'description' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }
        //auth()->user
        $rate = Rate::where('from_user',1)->where('to_user',$request->id)->get();
        if(!count($rate))
        {
            Rate::create([
                'from_user' => 1,
                'to_user' => $request->id,
                'rate' => $request->rate,
                'description' => $request->description,
            ]);
        }
        else
        {
            //because update() works only on objects while get() returns a collection
            $rate = $rate[0];
            $rate->update([
                'rate' => $request->rate,
                'description' => $request->description,
            ]);
        }

        //if(Auth::user()->position == 2) //section head
        //{
            //if not checked it will not be sent with the request
            if(request('top_user'))
            {
                User::where('top_user',true)->update(['top_user' => false]); //investigate this
                User::find($request->id)->update(['top_user'=>true]);
            }
        //}
        return response()->json(['status'=>'ok']);
    }
}
