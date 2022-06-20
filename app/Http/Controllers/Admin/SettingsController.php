<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Translation;
use App\Traits\EnvSetting;
use App\Traits\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    use Upload;
    use EnvSetting;

    public function general()
    {
        $translations = Translation::get();

        return view('admin.settings.general', [
            'translations' => $translations
        ]);
    }

    public function generalUpdate(Request $request)
    {
        $values['site_url'] = $request->site_url;
        $values['site_name'] = $request->site_name;
        $values['home_title'] = $request->home_title;
        $values['meta_keywords'] = $request->meta_keywords;
        $values['meta_description'] = $request->meta_description;
        $values['storage_uploads'] = (int) $request->storage_uploads;
        $values['max_file_size'] = (int) $request->max_file_size;
        $values['force_https'] = (bool) $request->force_https;
        $values['language'] = $request->language;

        foreach ($values as $key => $value) {
            Settings::where('name', $key)->update([
                'value' => $value
            ]);
        }

        return redirect()->route('settings.general')->with('success', __('Settings general saved'));
    }

    public function appareance()
    {
        return view('admin.settings.appareance');
    }

    public function appareanceUpdate(Request $request)
    {
        $this->NothashFile = true;
        $values = $this->saveFile($request, ['logo', 'favicon'], 'logo');

        if ($values) {
            foreach ($values as $key => $value) {
                Settings::where('name', $key)->update([
                    'value' => $value
                ]);
            }
        }

        return redirect()->route('settings.appareance')->with('success', __('Settings appareance saved'));
    }

    public function email()
    {
        return view('admin.settings.email');
    }

    public function emailUpdate(Request $request)
    {
        $values['MAIL_HOST'] = $request->mail_host;
        $values['MAIL_PORT'] = $request->mail_port;
        $values['MAIL_USERNAME'] = $request->mail_username;
        $values['MAIL_PASSWORD'] = $request->mail_password;
        $values['MAIL_ENCRYPTION'] = $request->mail_encryption;
        $values['MAIL_FROM_ADDRESS'] = $request->from_address;
        $values['MAIL_FROM_NAME'] = $request->from_name;

        $this->setEnvironmentValue($values);

        return redirect()->route('settings.email')->with('success', __('Settings mail saved.'));
    }

    public function captcha(Request $request)
    {
        return view('admin.settings.captcha');
    }

    public function captchaUpdate(Request $request)
    {
        $values['recaptcha_public_key'] = $request->recaptcha_public_key;
        $values['recaptcha_secret_key'] = $request->recaptcha_secret_key;
        $values['recaptcha_registration'] = (bool) $request->recaptcha_registration;
        $values['recaptcha_login'] = (bool) $request->recaptcha_login;
        $values['recaptcha_forgot_password'] = (bool) $request->recaptcha_forgot_password;

        foreach ($values as $key => $value) {
            Settings::where('name', $key)->update([
                'value' => $value
            ]);
        }

        return redirect()->route('settings.captcha')->with('success', __('Settings captcha saved.'));
    }

    public function pages(Request $request)
    {
        return view('admin.settings.privacy-social');
    }

    public function pagesUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'privacy_policy_link' => ['nullable', 'url'],
            'term_service_link' => ['nullable', 'url'],
            'facebook_link' => ['nullable', 'url'],
            'twitter_link' => ['nullable', 'url'],
            'linkedin_link' => ['nullable', 'url']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $values['privacy_policy_link'] = $request->privacy_policy_link;
        $values['term_service_link'] = $request->term_service_link;
        $values['facebook_link'] = $request->facebook_link;
        $values['twitter_link'] = $request->twitter_link;
        $values['linkedin_link'] = $request->linkedin_link;

        foreach ($values as $key => $value) {
            Settings::where('name', $key)->update([
                'value' => $value
            ]);
        }

        return redirect()->route('settings.pages')->with('success', __('Settings pages saved.'));
    }

    public function storageAmazon(Request $request)
    {
        return view('admin.storage.amazonS3');
    }

    public function storageAmazonUpdate(Request $request)
    {
        $values['AWS_ACCESS_KEY_ID'] = $request->aws_access_key_id;
        $values['AWS_SECRET_ACCESS_KEY'] = $request->aws_secret_access_key;
        $values['AWS_DEFAULT_REGION'] = $request->aws_default_region;

        $this->setEnvironmentValue($values);

        return redirect()->route('settings.storage.amazon')->with('success', __('Settings storage amazon saved.'));
    }

    public function storageWasabi(Request $request)
    {
        return view('admin.storage.wasabi');
    }

    public function StorageWasabiUpdate(Request $request)
    {
        $values['WASABI_ACCESS_KEY_ID'] = $request->wasabi_access_key_id;
        $values['WASABI_SECRET_ACCESS_KEY'] = $request->wasabi_secret_access_key;
        $values['WASABI_DEFAULT_REGION'] = $request->wasabi_default_region;
        $values['WASABI_BUCKET'] = $request->wasabi_bucket;

        $this->setEnvironmentValue($values);

        return redirect()->route('settings.storage.wasabi')->with('success', __('Settings storage wasabi saved.'));
    }

    public function showFacebookLoginApi(Request $request)
    {
        return view('admin.settings.facebook-login-api');
    }

    public function storeFacebookLoginApi(Request $request)
    {
        $values['FACEBOOK_CLIENT_ID'] = $request->client_id_facebook_login;
        $values['FACEBOOK_CLIENT_SECRET'] = $request->client_secret_facebook_login;
        $values['FACEBOOK_CLIENT_CALLBACK'] = $request->redirect_url_facebook_login;

        $this->setEnvironmentValue($values);

        return redirect()->route('settings.facebook.login.api')->with('success', __('Settings facebook login api saved.'));
    }
}
