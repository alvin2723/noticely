<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();


    //     $this->clearLoginAttempts($request);

    //     if ($response = $this->authenticated($request, $this->guard()->user())) {
    //         return $response;
    //     }

    //     $user = Auth::user();
    //     if($user->hasRole('Staff'))
    //     {
    //         return $request->wantsJson()
    //         ? new Response('', 204)
    //         : redirect()->intended($this->redirectPath());
            
    //     }
    //     else if($user->hasRole('Admin')){
    //         return $request->wantsJson()
    //         ? new Response('', 204)
    //         : redirect()->intended('/dashboard');
    //     }
     
    // }
}
