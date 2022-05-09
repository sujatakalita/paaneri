<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    { 
        if($request->user_type==2){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required'],
                "mobile" =>  ['required'],
                "otp" =>  ['required'],
            ]);
            $find_user=User::where('mobile_no',$request->mobile)->first();
            if(!$find_user){
                Toastr::warning('Mobile number not found', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
            if($find_user->otp!=$request->otp){
                Toastr::warning('OTP not match', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();
            }
            $data=[
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile_no'=>$request->mobile,
                'otp'=>$request->otp,
                'is_mobile_no_verified'=>1,
            ];
            $find_user->update($data);
            event(new Registered($find_user));

            Auth::login($find_user);
            Toastr::success('Login successfully', '', ["positionClass" => "toast-top-right"]);
            return redirect(RouteServiceProvider::HOME);
         
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
