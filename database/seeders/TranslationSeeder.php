<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values['English'] = 'en';

        foreach ($values as $key => $value) {
            Translation::create([
                'name' => $key,
                'locale' => $value,
            ]);
        }
    }
}
