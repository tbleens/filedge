<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values['name_app'] = 'Filedge';
        $values['app_version'] = '1.0';
        $values['site_url'] = env('APP_URL');
        $values['site_name'] = 'Filedge';
        $values['home_title'] = 'Upload File — Free File Hosting';
        $values['force_https'] = 0;
        $values['home_page_title'] = null;
        $values['meta_keywords'] = 'uploads free, sharing, manage uploads';
        $values['meta_description'] = 'Upload your Images, documents, music, and video in a single place and access them anywhere and share them everywhere.';
        $values['logo'] = 'logo.png';
        $values['favicon'] = 'favicon.png';
        $values['site_language'] = 'en';
        $values['license_key'] = null;
        $values['license_type'] = null;
        $values['recaptcha_public_key'] = null;
        $values['recaptcha_secret_key'] = null;
        $values['recaptcha_registration'] = null;
        $values['recaptcha_login'] = null;
        $values['recaptcha_forgot_password'] = null;
        $values['term_service_link'] = null;
        $values['privacy_policy_link'] = null;
        $values['facebook_link'] = null;
        $values['twitter_link'] = null;
        $values['linkedin_link'] = null;
        $values['storage_uploads'] = 1;
        $values['max_file_size'] = 1073741824;
        $values['language'] = 'en';
        $values['home_top_ads'] = '<img src="https://via.placeholder.com/728x90" class="img-fluid">';
        $values['home_bottom_ads'] = '<img src="https://via.placeholder.com/728x90" class="img-fluid">';
        $values['download_top_ads'] = '<img src="https://via.placeholder.com/728x90" class="img-fluid">';
        $values['download_right_ads'] = '<img src="https://via.placeholder.com/300x400" class="img-fluid">';
        $values['blog_top_ads'] = '<img src="https://via.placeholder.com/300x400" class="img-fluid">';
        $values['blog_bottom_ads'] = '<img src="https://via.placeholder.com/300x400" class="img-fluid">';

        foreach ($values as $key => $value) {
            Settings::create([
                'name' => $key,
                'value' => $value,
            ]);
        }
    }
}
