<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function createUser()
    {
        return view('user.auth.register');
    }
    public function sendOTP(Request $request)
    {
        
        try {
            $otp = $this->generateOtp();
            $already_mobile_no_verified = User::where('mobile_no', $request->mobile)->where('is_mobile_no_verified', 1)->first();
            $mobile_no_notverified = User::where('mobile_no', $request->mobile)->where('is_mobile_no_verified', 0)->first();
            if ($already_mobile_no_verified != null) {
                return $data = [
                    'code' => 200,
                    'msg' => 'This number already in used.'
                ];
            } elseif ($mobile_no_notverified != null) {
                $mobile_no_notverified->update(['otp' => $otp]);
                return $data = [
                    'code' => 200,
                    'msg' => 'OTP send successfully'
                ];
            } else {
                $data = [
                    'mobile_no' => $request->mobile,
                    'otp' => $otp,
                ];
                $user = User::create($data);
                $user->assignRole('User');
                return $data = [
                    'code' => 200,
                    'msg' => 'OTP send successfully'
                ];
            }
        } catch (\Throwable $th) {
            return $data = [
                'code' => 400,
                'msg' => $th,
            ];
        }
    }
    protected function generateOtp()
    {
        $otp = mt_rand(10000, 99999);
        return $otp;
    }
    public function login(){
        return view('user.auth.login');
    }
   
}
