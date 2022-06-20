<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialiteController extends Controller
{
    protected $providers = ["facebook"];

    // Redirect to provider
    public function redirect(Request $request)
    {
        $provider = $request->provider;

        if ($provider == "facebook") {
            if (env('FACEBOOK_CLIENT_ID') == null) {
                echo "Please adjust Facebook login settings from the admin panel";
            } else {
                return Socialite::driver($provider)->redirect();
            }
        } else {
            return redirect('/');
        }
    }

    // Handle provider callback
    public function callback(Request $request)
    {
        $provider = $request->provider;

        if (in_array($provider, $this->providers)) {
            try {
                $data = Socialite::driver($request->provider)->stateless()->user();

                $user = $data->user;

                $finduser = User::where('facebook_id', $user['id'])->first();

                if ($finduser) {
                    Auth::login($finduser);
                    return redirect()->route('user.files.list');
                }

                $findemail = User::where('email', $user['email'])->first();

                if ($findemail) {
                    Auth::login($findemail);
                    return redirect()->route('user.files.list');
                }

                $newUser = User::create([
                    'name' => $user['name'],
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                ]);

                if ($newUser) {
                    Auth::login($newUser);
                    return redirect()->route('user.files.list');
                }
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }
        abort(404);
    }
}
