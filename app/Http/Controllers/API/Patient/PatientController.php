<?php

namespace App\Http\Controllers\API\Patient;

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
           // Statement condition when user input wrong username or password or both
            if (User::where('username', $request->username)->first() == null) {
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Username tidak ditemukan'
                ], 401);
            }

            if (User::where('username', $request->username)->first() != null) {
                $user = User::where('username', $request->username)->first();
                if ($user->password != $request->password) {
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'Password salah'
                    ], 401);
                }
            }

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
        $user->save(); 
        
        $curl = curl_init();
        $token = "_1LXaUBC!ZkZ9P!5wfe0";
        $url = "https://api.fonnte.com/send";
        // $date = Carbon::now();
        $pesan = 'Halo, ini adalah token sekali pakai untuk memperbarui password akun kamu ' .$otp;
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
    ),
    CURLOPT_HTTPHEADER => array(
        "Authorization: $token" //change TOKEN to your actual token
     ),
    ));

    $response = curl_exec($curl);
    $phone_number = $user->phone_number;
  

        return response()->json([
            'status' => 'Success',
            'message' => 'OTP sent',
            'otp' => $otp,
            'phone_number' => $phone_number
        ], 200);
    }

    public function validateOTP(Request $request){
        $request->validate([
            'phone_number' => 'required',
            'otp' => 'required'
        ]);
    
        $user = User::where('phone_number', $request->phone_number)->where('otp', $request->otp)->first();
    
        if(!$user){
            return response()->json([
                'status' => 'Failed',
                'message' => 'OTP yang anda masukkan salah'
            ], 401);
        }
    
        
    
        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil memasukkan OTP, silakan perbarui sandi anda',
            'data' => $user->phone_number,
            'otp' => $user->otp
        ], 201);
    }
    
    public function resetPassword(Request $request){
        $request->validate([
            'otp' => 'required',
            'phone_number' => 'required',
            'new_password' => 'required'
        ]);

        $user = User::where('phone_number', $request->phone_number)->first();

        if(!$user){
            return response()->json([
                'status' => 'Failed',
                'message' => 'Anda tidak berhak untuk mengubah sandi'
            ], 401);
        }

        $user->otp = null;
        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Berhasil memperbarui sandi anda'
        ], 201);
    }

}
