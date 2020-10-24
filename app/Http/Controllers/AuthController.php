<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // didn't use validate helper function because if fails it will redirect to the previous page
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['status'=>$validator->errors()]);
        }
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        $token = $user->createToken('authToken')->accessToken;
        return response()->json(['status'=>'ok','token'=>$token]);
    }

    public function login(Request $request)
    {
        $credentials = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($credentials->fails())
        {
            return response()->json(['status' => $credentials->errors()]);
        }

        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json(['status'=>'Invalid Credentials']);
        }

        $token = Auth::user()->createToken('authToken')->accessToken;
        return response()->json(['status'=>'ok','token' => $token]);

    }

    public function userInfo()
    {
        $user = Auth::user();
        return response()->json(['status'=>'ok','user'=>$user]);
    }
}
