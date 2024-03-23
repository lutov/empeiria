<?php

namespace Database\Seeders;

use App\Models\Characters\Avatar;
use Illuminate\Database\Seeder;

class CharacterAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avatar::create(array('name' => '001', 'gender_id' => 1));
        $length = 1000;
        $delimiter = ',';
        $handle = fopen(storage_path('app/seeders/characters_avatars_male.csv'), "r");
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            Avatar::create(array('name' => $row[0], 'gender_id' => 2));
        }
        fclose($handle);
        $handle = fopen(storage_path('app/seeders/characters_avatars_female.csv'), "r");
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            Avatar::create(array('name' => $row[0], 'gender_id' => 3));
        }
        fclose($handle);
    }
}
