<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email',
            'password'=>'required|string|confirmed'
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);

        if($user->save()){
            return response()->json([
                'message'=>'User created successfully!',
                'status_code'=> 201
            ],201);
        }else{
            return response()->json([
                'message'=>'Some errors ',
                'status_code'=> 500
            ],500);

        }
    }
}