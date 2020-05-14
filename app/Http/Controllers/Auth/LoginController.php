<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
    }


    protected function validateLogin(Request $request)
    {
        $messages = [
            'email.required' => 'Kindly provide your  registered email address',
            'email.email' => 'Kindly provide a valid email address',
            'password.required' => 'Kindly provide your password',
            'failed' => 'Invalid login credentials. kindly confirm and try again.',

        ];

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], $messages);
    }

    public function showLoginForm()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }

        return view('auth.login');
    }


    public function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
        $notification = [
            'message' => 'Welcome to your dashboard Mr' . ' ' . $user->first_name,
            'alert-type' => 'success'
        ];
        return redirect()->intended(RouteServiceProvider::HOME)->with($notification);
    }


    public function logout()
    {
        Auth::logout();
        $notification = [
            'message' => 'You\'ve been logged out!',
            'alert-type' => 'error'
        ];
        return redirect('/login')->with($notification);
    }
}
