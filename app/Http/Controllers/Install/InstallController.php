<?php

namespace App\Http\Controllers\Install;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\EnvSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class InstallController extends Controller
{
    use EnvSetting;

    public function index()
    {
        $extensions = array(
            1 => 'bcmath', 2 => 'ctype', 3 => 'fileinfo', 4 => 'json', 5 => 'mbstring', 6 => 'openssl', 7 => 'PDO', 8 => 'tokenizer', 9 => 'xml', 10 => 'curl'
        );

        $allExtension = get_loaded_extensions();
        $phpVersion['version'] = phpversion().' >= 7.3';
        $phpVersion['valid'] = phpversion() >= '7.3' ? true : false;

        $DisableExtension = false;

        $DisableExtension = $phpVersion['valid'] ? false : true;
        foreach ($extensions as $extension) {
            if (!in_array($extension, $allExtension)) {
                $DisableExtension = true;
            }
        }

        return view('install.index', [
            'extensions' => $extensions, 'allextension' => $allExtension, 'phpversion' => $phpVersion, 'DisableExtension' => $DisableExtension
        ]);
    }

    public function indexcheckDatabase()
    {
        return view('install.database');
    }

    public function indexaccount()
    {
        return view('install.account');
    }

    public function complete()
    {
        $data = array();
        $data['APP_INSTALL'] = 'true';
        $data['APP_DEBUG'] = 'false';

        $this->setEnvironmentValue($data);

        return view('install.complete');
    }

    public function installRequirement()
    {
        $extensions = array(
            1 => 'bcmath', 2 => 'ctype', 3 => 'fileinfo', 4 => 'json', 5 => 'mbstring', 6 => 'openssl', 7 => 'PDO', 8 => 'tokenizer', 9 => 'xml', 10 => 'curl'
        );

        $allExtension = get_loaded_extensions();
        $phpVersion['version'] = phpversion();
        $phpVersion['valid'] = phpversion() >= '7.3' ? true : false;

        $DisableExtension = false;

        $DisableExtension = $phpVersion['valid'] ? false : true;
        foreach ($extensions as $extension) {
            if (!in_array($extension, $allExtension)) {
                $DisableExtension = true;
            }
        }

        if ($DisableExtension) {
            return Redirect::back();
        } else {
            return Redirect::route('install.database');
        }
    }


    public function installDB(Request $request)
    {
        Artisan::call("migrate");
        Artisan::call("db:seed --class=SettingsSeeder");
        Artisan::call("db:seed --class=ExtensionSeeder");
        Artisan::call("db:seed --class=TranslationSeeder");
        Artisan::call("db:seed --class=FaqSeeder");

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 1
        ]);

        return Redirect::route('install.complete');
    }

    public function checkDatabase(Request $request)
    {
        $data['DB_HOST'] = $request->database_hostname;
        $data['DB_PORT'] = $request->database_port;
        $data['DB_DATABASE'] = $request->database_name;
        $data['DB_USERNAME'] = $request->database_username;
        $data['DB_PASSWORD'] = $request->database_password;

        $data['APP_URL'] = $request->getSchemeAndHttpHost();

        $settings = config("database.connections.mysql");

        config([
            'database' => [
                'default' => 'mysql',
                'connections' => [
                    'mysql' => array_merge($settings, [
                        'driver' => 'mysql',
                        'host' => request()->input('database_hostname'),
                        'port' => request()->input('database_port'),
                        'database' => request()->input('database_name'),
                        'username' => request()->input('database_username'),
                        'password' => request()->input('database_password'),
                    ]),
                ],
            ],
        ]);

        DB::purge();

        try {
            DB::connection()->getPdo();
            $this->setEnvironmentValue($data);
        } catch (\Exception $e) {
            return Redirect::back()->withInput()->with([
                'status' => __('Invalid database credentials. '. $e->getMessage())
            ]);
        }

        return Redirect::route('install.account');
    }

    protected function clearcache()
    {
        Artisan::call("cache:clear");
        Artisan::call("config:clear");
        Artisan::call("route:cache");
        Artisan::call("view:clear");
    }
}
