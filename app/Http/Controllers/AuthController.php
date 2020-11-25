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
            'fullname' => 'required|max:50',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['status'=>$validator->errors()]);
        }
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        $token = $user->createToken('authToken')->plainTextToken;
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
        $user = Auth::user();
        $user->tokens()->where('tokenable_id', $user->id)->delete();
        
        $token = Auth::user()->createToken('authToken')->plainTextToken;
        return response()->json(['status'=>'ok','token' => $token]);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['status'=>'ok']);
    }

    public function userInfo()
    {
        $user = Auth::user();
        return response()->json(['status'=>'ok','user'=>$user]);
    }
}
