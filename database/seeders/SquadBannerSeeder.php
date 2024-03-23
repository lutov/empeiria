<?php

namespace Database\Seeders;

use App\Helpers\ColorHelper;
use App\Models\Squads\Banner;
use Illuminate\Database\Seeder;

class SquadBannerSeeder extends Seeder
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
        $handle = fopen(storage_path('app/seeders/squads_banners.csv'), "r");
        while ($row = fgetcsv($handle, $length, $delimiter)) {
            Banner::create(array('name' => $row[0]));
        }
        fclose($handle);

        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            $name = 'random_0' . $i;
            $this->random($name);
            Banner::create(array('name' => $name));
        }
    }

    /**
     * @param string $name
     */
    private function random(string $name)
    {
        $x = $y = 4;
        $pixel = 8;
        $luminosity = 'dark';
        $gd = imagecreatetruecolor($x * $pixel * 2, $y * $pixel * 2);
        $image = array();
        $hue = ColorHelper::getRandomHue();
        for ($i = 0; $i < $x; $i++) {
            $colors = ColorHelper::many($x, array('luminosity' => $luminosity, 'hue' => $hue, 'format' => 'rgb'));
            foreach ($colors as $key => $color) {
                $colorId = imagecolorallocate($gd, $color['r'], $color['g'], $color['b']);
                $image[$i][$key] = $colorId;
            }
            $image[$i] = array_merge($image[$i], array_reverse($image[$i]));
        }
        $image = array_merge($image, array_reverse($image));
        $y1 = 0;
        foreach ($image as $i => $row) {
            $x1 = 0;
            $y2 = $y1 + ($pixel - 1);
            foreach ($row as $key => $color) {
                $x2 = $x1 + ($pixel - 1);
                imagefilledrectangle($gd, $x1, $y1, $x2, $y2, $color);
                $x1 = $x2 + 1;
            }
            $y1 = $y2 + 1;
        }
        $path = 'img/squads/banners/' . $name . '.png';
        imagepng($gd, public_path($path));
        imagedestroy($gd);
    }
}
