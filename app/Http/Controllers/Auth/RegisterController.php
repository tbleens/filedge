<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show register page
     *
     * @return void
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * create
     *
     * @param  mixed $request
     * @return void
     */
    public function create(CreateUserRequest $request)
    {
        if (config('settings.recaptcha_registration')) {
            $recaptcha = $this->recaptcha($request->input('recaptcha_token'));

            if (!$recaptcha) {
                return Redirect::back()->withInput()
            ->with(['error'=> __('invalid captcha')]);
            }
        }

        $email = $request->email;
        $name = $request->name;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($request->password),
            'role' => 0,
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('user.files.list');
    }

    /**
     * Verify captcha v3
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
