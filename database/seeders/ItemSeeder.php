<?php

namespace Database\Seeders;

use App\Models\Items\Attribute;
use App\Models\Items\Item;
use App\Models\Items\Parameter;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
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
        $handle = fopen(storage_path('app/seeders/items.csv'), 'r');
        $headers = fgetcsv($handle, $length, $delimiter);
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            $name = array_combine($headers, $row);
            $item = Item::create($name);
            $parameters = Parameter::all(); // TODO filter parameters
            foreach ($parameters as $parameter) {
                $item->parameters()->attach($parameter->id, ['value' => rand($parameter->min, $parameter->max)]);
            }
            $attributes = Attribute::all(); // TODO filter attributes
            foreach ($attributes as $attribute) {
                $item->attributes()->attach($attribute->id);
            }
        }
        fclose($handle);

        $items = array(
            'Club' => [
                'parameters' => [
                    'damage' => '6',
                    'anti-armor' => '6',
                    'durability' => '8',
                    'speed' => '6',
                    'reach' => '5',
                    'defense' => '4',
                    'universality' => '5',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'one-handed', 'blunt', 'short', 'light', 'sidearm']
            ],
            'Mace' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '7',
                    'durability' => '10',
                    'speed' => '5',
                    'reach' => '5',
                    'defense' => '5',
                    'universality' => '5',
                    'complexity' => '4',
                ],
                'attributes' => ['weapon', 'one-handed', 'blunt', 'short', 'heavy']
            ],
            'Morning star' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '9',
                    'durability' => '9',
                    'speed' => '5',
                    'reach' => '5',
                    'defense' => '5',
                    'universality' => '5',
                    'complexity' => '5',
                ],
                'attributes' => ['weapon', 'one-handed', 'blunt', 'short', 'heavy']
            ],
            'Pernach' => [
                'parameters' => [
                    'damage' => '7',
                    'anti-armor' => '10',
                    'durability' => '8',
                    'speed' => '5',
                    'reach' => '5',
                    'defense' => '5',
                    'universality' => '5',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'one-handed', 'blunt', 'short', 'heavy']
            ],
            'Flail' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '6',
                    'durability' => '5',
                    'speed' => '4',
                    'reach' => '7',
                    'defense' => '3',
                    'universality' => '1',
                    'complexity' => '4',
                ],
                'attributes' => ['weapon', 'two-handed', 'blunt', 'long', 'heavy', 'flexible']
            ],
            'Battle axe' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '6',
                    'durability' => '6',
                    'speed' => '6',
                    'reach' => '5',
                    'defense' => '3',
                    'universality' => '5',
                    'complexity' => '3',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'light']
            ],
            'Bardiche' => [
                'parameters' => [
                    'damage' => '10',
                    'anti-armor' => '8',
                    'durability' => '7',
                    'speed' => '5',
                    'reach' => '6',
                    'defense' => '5',
                    'universality' => '6',
                    'complexity' => '7',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'heavy']
            ],
            'War hammer' => [
                'parameters' => [
                    'damage' => '10',
                    'anti-armor' => '10',
                    'durability' => '8',
                    'speed' => '5',
                    'reach' => '5',
                    'defense' => '5',
                    'universality' => '5',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'one-handed', 'blunt', 'short', 'heavy']
            ],
            'Goedendag' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '8',
                    'durability' => '8',
                    'speed' => '3',
                    'reach' => '6',
                    'defense' => '3',
                    'universality' => '6',
                    'complexity' => '4',
                ],
                'attributes' => ['weapon', 'two-handed', 'blunt', 'long', 'heavy', 'piercing']
            ],
            'Quarterstaff' => [
                'parameters' => [
                    'damage' => '6',
                    'anti-armor' => '6',
                    'durability' => '6',
                    'speed' => '7',
                    'reach' => '7',
                    'defense' => '7',
                    'universality' => '7',
                    'complexity' => '1',
                ],
                'attributes' => ['weapon', 'two-handed', 'blunt', 'long', 'light']
            ],

            'Knife' => [
                'parameters' => [
                    'damage' => '4',
                    'anti-armor' => '4',
                    'durability' => '6',
                    'speed' => '10',
                    'reach' => '3',
                    'defense' => '3',
                    'universality' => '8',
                    'complexity' => '3',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'light', 'sidearm']
            ],
            'Dagger' => [
                'parameters' => [
                    'damage' => '3',
                    'anti-armor' => '8',
                    'durability' => '6',
                    'speed' => '10',
                    'reach' => '3',
                    'defense' => '3',
                    'universality' => '10',
                    'complexity' => '3',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'light', 'sidearm', 'piercing']
            ],
            'Shortsword' => [
                'parameters' => [
                    'damage' => '5',
                    'anti-armor' => '5',
                    'durability' => '5',
                    'speed' => '8',
                    'reach' => '5',
                    'defense' => '5',
                    'universality' => '8',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'light', 'sidearm']
            ],
            'Arming sword' => [
                'parameters' => [
                    'damage' => '7',
                    'anti-armor' => '5',
                    'durability' => '5',
                    'speed' => '6',
                    'reach' => '6',
                    'defense' => '6',
                    'universality' => '8',
                    'complexity' => '7',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'light']
            ],
            'Longsword' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '8',
                    'durability' => '6',
                    'speed' => '8',
                    'reach' => '8',
                    'defense' => '8',
                    'universality' => '8',
                    'complexity' => '8',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light']
            ],
            'Katana' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '6',
                    'durability' => '6',
                    'speed' => '8',
                    'reach' => '6',
                    'defense' => '8',
                    'universality' => '8',
                    'complexity' => '8',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'short', 'light']
            ],
            'Rapier' => [
                'parameters' => [
                    'damage' => '7',
                    'anti-armor' => '8',
                    'durability' => '4',
                    'speed' => '9',
                    'reach' => '9',
                    'defense' => '5',
                    'universality' => '5',
                    'complexity' => '8',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'long', 'light', 'flexible', 'piercing']
            ],
            'Estoc' => [
                'parameters' => [
                    'damage' => '7',
                    'anti-armor' => '10',
                    'durability' => '7',
                    'speed' => '7',
                    'reach' => '7',
                    'defense' => '7',
                    'universality' => '4',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light', 'piercing']
            ],
            'Saber' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '4',
                    'durability' => '5',
                    'speed' => '8',
                    'reach' => '6',
                    'defense' => '6',
                    'universality' => '7',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'flexible', 'light']
            ],
            'Falchion' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '5',
                    'durability' => '6',
                    'speed' => '7',
                    'reach' => '5',
                    'defense' => '6',
                    'universality' => '7',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'one-handed', 'sharp', 'short', 'light']
            ],

            'Military fork' => [
                'parameters' => [
                    'damage' => '3',
                    'anti-armor' => '3',
                    'durability' => '5',
                    'speed' => '8',
                    'reach' => '7',
                    'defense' => '8',
                    'universality' => '4',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light', 'piercing']
            ],
            'War scythe' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '2',
                    'durability' => '3',
                    'speed' => '7',
                    'reach' => '5',
                    'defense' => '2',
                    'universality' => '2',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light']
            ],
            'Bill' => [
                'parameters' => [
                    'damage' => '6',
                    'anti-armor' => '6',
                    'durability' => '6',
                    'speed' => '6',
                    'reach' => '7',
                    'defense' => '5',
                    'universality' => '4',
                    'complexity' => '5',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light']
            ],
            'Voulge' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '6',
                    'durability' => '6',
                    'speed' => '5',
                    'reach' => '7',
                    'defense' => '4',
                    'universality' => '4',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'heavy']
            ],
            'Halberd' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '8',
                    'durability' => '6',
                    'speed' => '6',
                    'reach' => '7',
                    'defense' => '8',
                    'universality' => '6',
                    'complexity' => '5',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'heavy', 'piercing']
            ],
            'Partisan' => [
                'parameters' => [
                    'damage' => '6',
                    'anti-armor' => '5',
                    'durability' => '5',
                    'speed' => '6',
                    'reach' => '7',
                    'defense' => '6',
                    'universality' => '7',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light', 'piercing']
            ],
            'Glaive' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '5',
                    'durability' => '5',
                    'speed' => '6',
                    'reach' => '7',
                    'defense' => '6',
                    'universality' => '6',
                    'complexity' => '8',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light']
            ],
            'Guisarme' => [
                'parameters' => [
                    'damage' => '6',
                    'anti-armor' => '6',
                    'durability' => '6',
                    'speed' => '6',
                    'reach' => '8',
                    'defense' => '6',
                    'universality' => '6',
                    'complexity' => '6',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light', 'piercing']
            ],
            'Ahlspiess' => [
                'parameters' => [
                    'damage' => '6',
                    'anti-armor' => '8',
                    'durability' => '8',
                    'speed' => '5',
                    'reach' => '7',
                    'defense' => '5',
                    'universality' => '3',
                    'complexity' => '5',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'light', 'piercing']
            ],
            'Pike' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '8',
                    'durability' => '6',
                    'speed' => '5',
                    'reach' => '10',
                    'defense' => '4',
                    'universality' => '4',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'heavy', 'piercing']
            ],
            'Lance' => [
                'parameters' => [
                    'damage' => '10',
                    'anti-armor' => '10',
                    'durability' => '5',
                    'speed' => '1',
                    'reach' => '10',
                    'defense' => '1',
                    'universality' => '1',
                    'complexity' => '5',
                ],
                'attributes' => ['weapon', 'two-handed', 'sharp', 'long', 'heavy', 'piercing']
            ],

            'Short bow' => [
                'parameters' => [
                    'damage' => '5',
                    'anti-armor' => '3',
                    'durability' => '3',
                    'speed' => '8',
                    'reach' => '10',
                    'defense' => '1',
                    'universality' => '3',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'two-handed', 'ranged', 'flexible', 'sharp', 'short', 'light', 'piercing']
            ],
            'Longbow' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '8',
                    'durability' => '3',
                    'speed' => '5',
                    'reach' => '10',
                    'defense' => '1',
                    'universality' => '1',
                    'complexity' => '2',
                ],
                'attributes' => ['weapon', 'two-handed', 'ranged', 'flexible', 'sharp', 'long', 'light', 'piercing']
            ],
            'Recurved bow' => [
                'parameters' => [
                    'damage' => '8',
                    'anti-armor' => '8',
                    'durability' => '5',
                    'speed' => '7',
                    'reach' => '10',
                    'defense' => '1',
                    'universality' => '5',
                    'complexity' => '8',
                ],
                'attributes' => ['weapon', 'two-handed', 'ranged', 'flexible', 'sharp', 'short', 'heavy', 'piercing']
            ],
            'Crossbow' => [
                'parameters' => [
                    'damage' => '9',
                    'anti-armor' => '9',
                    'durability' => '5',
                    'speed' => '3',
                    'reach' => '10',
                    'defense' => '2',
                    'universality' => '3',
                    'complexity' => '8',
                ],
                'attributes' => ['weapon', 'two-handed', 'ranged', 'sharp', 'short', 'heavy', 'piercing']
            ],

            'Boiled leather' => [
                'parameters' => [
                    'armor' => '2',
                    'speed' => '9',
                    'universality' => '9',
                    'complexity' => '3',
                ],
                'attributes' => ['armor', 'light']
            ],
            'Gambeson' => [
                'parameters' => [
                    'armor' => '4',
                    'speed' => '8',
                    'universality' => '8',
                    'complexity' => '5',
                ],
                'attributes' => ['armor', 'light']
            ],
            'Lamellar armour' => [
                'parameters' => [
                    'armor' => '5',
                    'speed' => '7',
                    'universality' => '6',
                    'complexity' => '5',
                ],
                'attributes' => ['armor', 'light']
            ],
            'Scale armour' => [
                'parameters' => [
                    'armor' => '6',
                    'speed' => '6',
                    'universality' => '6',
                    'complexity' => '5',
                ],
                'attributes' => ['armor', 'light']
            ],
            'Laminar armour' => [
                'parameters' => [
                    'armor' => '7',
                    'speed' => '6',
                    'universality' => '6',
                    'complexity' => '5',
                ],
                'attributes' => ['armor', 'light']
            ],
            'Hauberk' => [
                'parameters' => [
                    'armor' => '6',
                    'speed' => '8',
                    'universality' => '7',
                    'complexity' => '8',
                ],
                'attributes' => ['armor', 'light']
            ],
            'Mail and plate armour' => [
                'parameters' => [
                    'armor' => '8',
                    'speed' => '6',
                    'universality' => '5',
                    'complexity' => '9',
                ],
                'attributes' => ['armor', 'heavy']
            ],
            'Mirror armour' => [
                'parameters' => [
                    'armor' => '8',
                    'speed' => '5',
                    'universality' => '4',
                    'complexity' => '8',
                ],
                'attributes' => ['armor', 'heavy']
            ],
            'Coat of plates' => [
                'parameters' => [
                    'armor' => '8',
                    'speed' => '6',
                    'universality' => '7',
                    'complexity' => '7',
                ],
                'attributes' => ['armor', 'heavy']
            ],
            'Brigandine' => [
                'parameters' => [
                    'armor' => '7',
                    'speed' => '8',
                    'universality' => '8',
                    'complexity' => '7',
                ],
                'attributes' => ['armor', 'heavy']
            ],
            'Breastplate' => [
                'parameters' => [
                    'armor' => '7',
                    'speed' => '5',
                    'universality' => '5',
                    'complexity' => '8',
                ],
                'attributes' => ['armor', 'heavy']
            ],
            'Plate armour' => [
                'parameters' => [
                    'armor' => '10',
                    'speed' => '3',
                    'universality' => '6',
                    'complexity' => '10',
                ],
                'attributes' => ['armor', 'heavy']
            ],
        );
    }
}
