<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AuthSendMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    /**
     * Show forget page
     *
     * @return void
     */
    public function index()
    {
        return view('auth.forget-password');
    }

    /**
     * forget password
     *
     * @param  mixed $request
     * @return void
     */
    public function forget(Request $request)
    {
        if (config('settings.recaptcha_forgot_password')) {
            $recaptcha = $this->recaptcha($request->input('recaptcha_token'));

            if (!$recaptcha) {
                return Redirect::back()->withInput()
                ->with(['error' => __('invalid captcha')]);
            }
        }

        $request->validate(['email' => 'required|email']);

        $user = User::where('email', '=', $request->email)->first();

        //Check if the user exists
        if (!$user) {
            return redirect()->back()->withErrors(['email' => __('User does not exist')]);
        }

        //generate a token
        $token = Str::random(60);

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $url = url(route('password.reset', [
            'token' => $token
        ], false));

        $details = [
            'title' => __('Forget Password'),
            'link' => $url,
            'view' => 'emails.forgotpassword'
        ];

        try {
            Mail::to($request->email)->send(new AuthSendMail($details));
            return redirect()->back()->with(
                'status',
                __('A reset link has been sent to your email address')
            );
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' =>
            __('A Network Error occurred, Please try again')]);
        }
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
