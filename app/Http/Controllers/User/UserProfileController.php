<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('user.profile.view');
    }

    public function getProfileRecord()
    {
        $get_profile_info['data'] = User::select('name','mobile_no','email')->where('id', auth()->user()->id)->get();
        return response()->json($get_profile_info);
    }

    public function updateProfileRecord(Request $request)
    {
        try {
            $user=User::where('id',auth()->user()->id)->first();
            $data=[
                'name'=>$request->name,
                'email'=>$request->email
            ];
            $user->update($data);
            if($user){
                echo "1";
            } else {
                echo "2";
            }
        } catch (\Throwable $th) {
            echo "3";
        }
    }

    public function updateMobileRecord(Request $request)
    {
        try {
            $user=User::where('id',auth()->user()->id)->first();
            $data=[
                'mobile_no'=>$request->mobile
            ];
            $user->update($data);
            if($user){
                echo "1";
            } else {
                echo "2";
            }
        } catch (\Throwable $th) {
            echo "3";
        }
    }
}
