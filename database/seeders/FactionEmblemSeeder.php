<?php

namespace Database\Seeders;

use App\Models\Factions\Emblem;
use Illuminate\Database\Seeder;

class FactionEmblemSeeder extends Seeder
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
        $handle = fopen(storage_path('app/seeders/factions_emblems.csv'), "r");
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            Emblem::create(array('name' => $row[0]));
        }
        fclose($handle);
    }
}
