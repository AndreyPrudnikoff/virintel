<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
            'remember_me'=>'boolean'
        ]);
        if(!Auth::attempt(['email'=> $request->email, 'password'=>$request->password])){
            return response()->json([
                'message'=>'Invalid username/password',
                'status_code'=>401
            ],401);
        }
        $user = User::where('email', $request->email)->first();
        $user=$request->user();

        if($user->role=='administrator'){
            $tokenData = $user->createToken('Personal Access Token', ['administrator']);
        }elseif($user->role=='user'){
            $tokenData = $user->createToken('Personal Access Token', ['user']);
        }elseif($user->role=='laboratory'){
            $tokenData = $user->createToken('Personal Access Token', ['laboratory']);
        }
        $token=$tokenData->token;
        if($request->remember_me){
            $token->expires_at=Carbon::now()->addWeek(1);
        }
        if($token->save()){
            return response()->json([
                'user'=>$user,
                'access_token'=>$tokenData->accessToken,
                'token_type'=>'Bearer',
                'token_scope'=>$tokenData->token->scopes[0],
                'expires_at'=>Carbon::parse($tokenData->token->expires_at)->toDateTimeString(),
                'status_code'=>200
            ], 200);
        }else{
            return response()->json([
                'massage'=>'Some error, Please try again',
                'status_code'=>500
            ],500);
        }
    }

    public function logout(Request $request){
        // $request->user()->tokens()->delete();
        $request->user()->token()->revoke();
         return response()->json([
             'message'=>'Logout successfully',
             'status_code'=>200
         ],200);
     }

     public function profile(Request $request){
         ///
     }
}