<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values['How do I retrieve the download link for a file ?'] = 'To retrieve the download link of a file, you need to go to your member area and from there you will be able to see the download link of the file you have uploaded to the site.
        It is not possible to retrieve the download link of a file you have downloaded as an anonymous user.';
        $values['Can I delete a file that has already been uploaded to the site ?'] = 'YES, you can delete a file that you have uploaded to the site if and only if the file was uploaded with your account.';
        $values['Can we add all types of files ?'] = 'Yes, you can upload all types of files to the site.';

        foreach ($values as $key => $value) {
            Faq::create([
                'question' => $key,
                'answer' => $value
            ]);
        }
    }
}
