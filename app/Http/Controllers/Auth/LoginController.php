<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * show login page
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * login
     *
     * @param  mixed $request
     * @return void
     */
    public function login(Request $request)
    {
        if (config('settings.recaptcha_login')) {
            $recaptcha = $this->recaptcha($request->input('recaptcha_token'));

            if (!$recaptcha) {
                return Redirect::back()->withInput()
                ->with(['error' => __('invalid captcha')]);
            }
        }

        $remember = $request->has('remember');

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $remember);

            if ($user->role) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('user.files.list');
            }
        }

        return Redirect::back()->withInput()
            ->with(['error' => __('your email or your password is not correct')]);
    }

    /**
     * verify captcha v3
     *
     * @param  mixed $_recaptcha
     * @return void
     */
    public function recaptcha($_recaptcha)
    {
        $recaptcha = new \ReCaptcha\recaptcha(config('settings.recaptcha_secret_key'));
        $resp = $recaptcha->verify($_recaptcha, Request()->ip());
        if ($resp->isSuccess()) {
            return true;
        } else {
            $this->errors = $resp->getErrorCodes();
            return false;
        }
    }
}
