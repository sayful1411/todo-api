<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\JWTToken;

class UserController extends Controller
{
    // BackEnd Section
    function Registration(Request $request){
        try {
            User::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],201);

        } catch (Exception $e){

            return response()->json([
                'status' => 'failed',
                // 'message' => 'User Registration Failed',
                'message' => $e->getMessage()
            ]);

        }
    }

    function Login(Request $request){
        $count = User::where('email', '=', $request->input('email'))
                ->where('password', '=', $request->input('password'))
                ->select('id')->first();

        if($count !== null){
            // JWT Token Issue
            $token = JWTToken::CreateToken($request->input('email'),$count->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successfully',
                'token' => $token,
                'userID' => $count->id
            ],200);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Incorrect login credential'
            ]);
        }
    }
}
