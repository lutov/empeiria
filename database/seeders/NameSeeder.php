<?php

namespace Database\Seeders;

use App\Models\Names\Name;
use Illuminate\Database\Seeder;

class NameSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() {
        $length = 1000;
        $delimiter = ',';
        $handle = fopen(storage_path('app/seeders/names.csv'), "r");
        $headers = fgetcsv($handle, $length, $delimiter);
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            $name = array_combine($headers, $row);
            Name::create($name);
        }
    }
}
