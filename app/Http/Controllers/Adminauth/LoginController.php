<?php

namespace App\Http\Controllers\Adminauth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Admin;
use Illuminate\Http\Request;
use Auth,Session;
use Hash, Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    protected $guard = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm() 
    {
        return view('auth.admin.login');
    }


    public function login(Request $request, Admin $admin)
    {
         $email = $request->input('email');
         $password = $request->input('password');

        $adminObj  = Admin::where('email',$email)->where('status',1)->first() ;
        // dd($adminObj);

        if($adminObj ){

            $check = Hash::check( $password, $adminObj->password); 
        // dd($check);
            $auth = auth()->guard('admin');

            // dd($auth);
            
            if($check==true){
                if ($auth->attempt(['email' => $email, 'password' => $password])) {
                    // Session::flash('success','You have successfully logged in');
                    Toastr::success('You have successfully logged in', '', ["positionClass" => "toast-top-right"]);
                     // return redirect()->intended($this->redirectPath());
                     // return redirect()->route('admin.dashboard'); 
                    return view('admin.dashboard');
                  }else{
                    // Session::flash('error','Please fix the error and try again !');
                    Toastr::warning('Please fix the error and try again !', '', ["positionClass" => "toast-top-right"]);
                     return redirect()->back();
                  }

            }else{
                // Session::flash('error','Please fix the error and try again !');
              Toastr::warning('Please fix the error and try again !', '', ["positionClass" => "toast-top-right"]);
                return redirect()->back();  
            }

        }else{
            // Session::flash('error','Please fix the error and try again !');
          Toastr::warning('Please fix the error and try again !', '', ["positionClass" => "toast-top-right"]);
            return redirect()->back(); 
        }

    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        // Auth::logout();
      Auth::guard('admin')->logout();
        // return redirect('/admin');
      return redirect()->route('admin.login');
    }
}
