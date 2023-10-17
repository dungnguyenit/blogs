<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //    public function login(LoginRequest $request)
    //    {
    //        $this->validateLogin($request);
    //
    //        // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //        // the login attempts for this application. We'll key this by the username and
    //        // the IP address of the client making these requests into this application.
    //        if (method_exists($this, 'hasTooManyLoginAttempts') &&
    //            $this->hasTooManyLoginAttempts($request)) {
    //            $this->fireLockoutEvent($request);
    //
    //            return $this->sendLockoutResponse($request);
    //        }
    //
    //        if ($this->attemptLogin($request)) {
    //            return $this->sendLoginResponse($request);
    //        }
    //
    //        // If the login attempt was unsuccessful we will increment the number of attempts
    //        // to login and redirect the user back to the login form. Of course, when this
    //        // user surpasses their maximum number of attempts they will get locked out.
    //        $this->incrementLoginAttempts($request);
    //
    //        return $this->sendFailedLoginResponse($request);
    //    }

    //    protected function validateLogin(LoginRequest $request)
    //    {
    //        dd($request->all());
    ////        $rules = [
    ////            'phone' => 'required|string',
    ////            'password' => 'required|string'
    ////        ];
    ////
    ////        $login = $request->input('email');
    ////        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    ////            $rules['email'] = 'required|string';
    ////            unset($rules['phone']);
    ////        }
    //
    //        $request->validate([]);
    //
    ////        $request->validate([
    ////            $this->username() => 'required|string',
    ////            'password' => 'required|string',
    ////        ]);
    //    }

    //    protected function credentials(Request $request): array
    //    {
    //        $credentials = [
    //            'phone' => $request->get('email'),
    //            'password' => $request->get('password')
    //        ];
    //        if (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
    //            return [
    //                'email' => $request->get('email'),
    //                'password' => $request->get('password')
    //            ];
    //        }
    //
    //        dd($credentials);
    //
    //        return $credentials;
    //    }
    //
    //    protected function sendFailedLoginResponse(Request $request)
    //    {
    //        throw ValidationException::withMessages([
    //            'email' => [trans('auth.failed')],
    //        ]);
    //    }
    //
    //    public function username(): string
    //    {
    //        $login = request()->input('email');
    //        $field = 'phone';
    //        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
    //            $field = 'email';
    //        }
    //
    //        request()->merge([$field => $login]);
    //
    //        return $field;
    //    }
}
