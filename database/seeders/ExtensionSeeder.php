<?php

namespace Database\Seeders;

use App\Models\Extension;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values['apk'] = 'apk.png';
        $values['csv'] = 'csv.png';
        $values['doc'] = 'doc.png';
        $values['docx'] = 'docx.png';
        $values['gif'] = 'gif.png';
        $values['jpeg'] = 'jpeg.png';
        $values['jpg'] = 'jpg.png';
        $values['m4a'] = 'm4a.png';
        $values['mp3'] = 'mp3.png';
        $values['mp4'] = 'mp4.png';
        $values['pdf'] = 'pdf.png';
        $values['png'] = 'png.png';
        $values['rar'] = 'rar.png';
        $values['txt'] = 'txt.png';
        $values['unknown'] = 'unknown.png';
        $values['wav'] = 'wav.png';
        $values['wmv'] = 'wmv.png';
        $values['xlsx'] = 'xlsx.png';
        $values['xlx'] = 'xlx.png';
        $values['zip'] = 'zip.png';

        foreach ($values as $key => $value) {
            Extension::create([
                'name' => $key,
                'file_icon' => $value,
            ]);
        }
    }
}
