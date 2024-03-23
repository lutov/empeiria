<?php

namespace Database\Seeders;

use App\Models\Worlds\Picture;
use Illuminate\Database\Seeder;

class WorldPictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $length = 1000;
        $delimiter = ',';
        $handle = fopen(storage_path('app/seeders/worlds_pictures.csv'), "r");
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            Picture::create(array('name' => $row[0]));
        }
        fclose($handle);
    }
}
