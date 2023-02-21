<?php

namespace App\Http\Controllers\Auth;

use App\Models\DataPegawai;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\Mime\Part\DataPart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    // protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest:admin')->except('logout');
      $this->middleware('guest:pegawai')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admin')->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
          // dd(auth()->user());

            if (auth()->user()->role == 'Administrator') 
            {
              return redirect()->route('admin.dashboard');
            }
            else if (auth()->user()->role == 'Validator') 
            {
              return redirect()->route('validator.dashboard');
            }
            else if (auth()->user()->role == 'Verifikator') 
            {
              return redirect()->route('verifikator.dashboard');
            }
            else if (auth()->user()->role == 'Member') 
            {
              return redirect()->route('member.dashboard');
            }
            else
            {
                return abort(404);
            }
        } 
        elseif (Auth::guard('pegawai')->attempt(array('email' => $input['email'], 'password' => $input['password']))) 
        {
          
          // dd(auth()->user());   

            if (auth()->user()->role == 'Administrator') 
            {
              return redirect()->route('admin.dashboard');
            }
            else if (auth()->user()->role == 'Validator') 
            {
              return redirect()->route('validator.dashboard');
            }
            else if (auth()->user()->role == 'Verifikator') 
            {
              return redirect()->route('verifikator.dashboard');
            }
            else if (auth()->user()->role == 'Member') 
            {
              return redirect()->route('member.dashboard');
            }
            else
            {
                return abort(404);
            }
        } 
        else
        {
            return redirect()
            ->route('login')
            ->with('error','Incorrect email or password!.');
        }


    }

    // redirect sesudah berhasil login kemana
    // public function redirectTo()
    // {
    //     if(auth()->user()->role == 'admin'){
    //         return '/admin/dashboard';
    //     } else if(auth()->user()->role == 'validator'){
    //         return '/validator/dashboard';
    //     } else if (auth()->user()->role == 'verifikator') {
    //         return '/verifikator/dashboard';
    //     } else if (auth()->user()->role == 'member') {
    //         return '/member/dashboard';
    //     } else {
    //         return '404';
    //     }
    // }
}
