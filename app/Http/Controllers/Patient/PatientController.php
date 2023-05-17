<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if(!Auth::attempt($credentials)){
            return response()->json([
                'status' => 'Error',
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();

        if($user->role != 'Pasien'){
            return response()->json([
                'status' => 'Error',
                'message' => 'Unauthorized'
            ], 401);
        } else {
            $token = $user->createToken('auth_sanctum', ['pasien'])->plainTextToken;

            return response()->json([
                'status' => 'Success',
                'message' => 'Login Success',
                'user' => $user,
                'access_token' => $token
            ], 200);
        }
    }

    public function keluar(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Logout Success'
        ]);
    }
}
