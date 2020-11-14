<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Rate;


class PromotionController extends Controller
{
    public function promote(Request $request)
    {
        $validator = Validator::make($request->all(),['id'=> 'required|exists:users']);

        if($validator->fails())
        {
            return response()->json(['status' => $validator->errors()]);
        }

        $newHead = User::find(request('id'));
        // if(Auth::user()->branch_id != $newHead->branch_id)
        // {
        //     return response()->json(['status' => 'The selected user not in your branch']);
        // }
        
        //if(Auth::user()->position_id == 3)
        //{
            $oldHead = User::where('section_id',$newHead->section_id)
                            ->where('branch_id',$newHead->branch_id)
                            ->where('position_id',2)
                            ->get();

            if(count($oldHead))
            {
                $oldHead = $oldHead[0];
                $oldHead->update(['position_id' => 1]);

                Rate::where('from_user',$oldHead->id)->delete();
            }

            $newHead->update(['position_id' => 2]);
        //}
        //else if(Auth::user()->position_id == 4)
        //{
            $oldHead = User::where('branch_id',$newHead->branch_id)
                            ->where('position_id',3)
                            ->get();

            if(count($oldHead))
            {
                $oldHead = $oldHead[0];
                $oldHead->update(['position_id' => 1]);

                Rate::where('from_user',$oldHead->id)->delete();
            }

            $newHead->update(['position_id' => 3]);

        //}
        //else
        //{
            //return response()->json(['status' => 'Unauthorized']);
        //}
    }
}
