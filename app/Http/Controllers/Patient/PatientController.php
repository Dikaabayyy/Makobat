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
        ], 200);
    }

    public function sendOTP(Request $request){
        $request->validate([
            'phone_number' => 'required'
        ]);

        $user = User::where('phone_number', $request->phone_number)->where('role', 'Pasien')->first();

        if(!$user){
            return response()->json([
                'status' => 'Error',
                'message' => 'User not found'
            ], 404);
        }

        $otp = rand(100000, 999999);

        $user->otp = $otp;
        // $user->save(); 
        
        $curl = curl_init();
        $token = "_1LXaUBC!ZkZ9P!5wfe0";
        $url = "https://fonnte.com/api/send_message.php";
        // $date = Carbon::now();
        $pesan = 'Halo, ini adalah password Baru kamu ' .$otp;
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
'target' => $request->phone_number,
'message' => $pesan, 
'countryCode' => '62', //optional
),
  CURLOPT_HTTPHEADER => array(
    'Authorization: '.$token //change TOKEN to your actual token
  ),
));
  

        return response()->json([
            'status' => 'Success',
            'message' => 'OTP sent',
            'otp' => $otp
        ], 200);
    }
}
