<?php

namespace Database\Seeders;

use App\Models\Characters\Perk;
use Illuminate\Database\Seeder;

class CharactersPerksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualities = array(
            array(
                'name' => 'Tall',
                'slug' => 'tall',
                'description' => "This character is noticeably taller than the average representative of his species. Being tall has its advantages and disadvantages, but more often than not, tall characters end up in the spotlight even against their will.",
                'alt_description' => "Этот персонаж заметно выше среднего представителя своего вида. Высокий рост имеет свои преимущества и недостатки, но чаще всего высокие персонажи оказываются в центре внимания даже против своей воли.",
                'icon' => '<i class="bi-person-standing"></i><i class="bi-person-standing fs-3"></i><i class="bi-person-standing"></i>',
            ),
            array(
                'name' => 'Short',
                'slug' => 'short',
                'description' => "This character is noticeably shorter than the average of his species. While this may seem like a disadvantage to some, short characters often exceed expectations, proving that size isn't everything.",
                'alt_description' => "Этот персонаж заметно ниже среднего представителя своего вида. Хотя, кому-то это может показаться недостатком, невысокие персонажи часто превосходят ожидания, доказывая что размер - это не главное.",
                'icon' => '<i class="bi-person-standing fs-3"></i><i class="bi-person-standing"></i><i class="bi-person-standing fs-3"></i>',
            ),
            array(
                'name' => 'Traveller',
                'slug' => 'traveller',
                'description' => "This character has spent a lot of time traveling since childhood, which is noticeable not only by his tan, but also by the confidence with which he moves along the road, and by the sparkle in his eyes when he looks at the horizon.",
                'alt_description' => "Этот персонаж с детства проводит много времени в путешествиях, что заметно не только по его загару, но и по той уверенности, с которой он движется по дороге, и по блеску его глаз, когда он смотрит на горизонт.",
                'icon' => '<i class="bi-sun-fill"></i><i class="bi-person-walking fs-3"></i><i class="bi-tree-fill"></i>',
            ),
            array(
                'name' => 'Homebody',
                'slug' => 'homebody',
                'description' => "This character has spent a lot of time indoors since childhood, which is noticeable not only in his pale skin, but also in how insecure he behaves on the road, and in the longing in his eyes when he looks at the distant horizon.",
                'alt_description' => "Этот персонаж с детства проводит много времени в помещении, что заметно не только по его бледной коже, но и по тому, как неуверенно он ведет себя в дороге, и по тоске в его глазах, когда он смотрит на далекий горизонт.",
                'icon' => '<i class="bi-sun-fill"></i><i class="bi-person-square fs-3"></i><i class="bi-tree-fill"></i>',
            ),
            array(
                'name' => 'Brawler',
                'slug' => 'brawler',
                'description' => "This character is clearly no stranger to brawls. His stuffed knuckles and broken nose give him a very characteristic appearance, not conducive to small talk.",
                'alt_description' => "Этот персонаж явно не новичок в потасовках. Набитые костяшки и сломанный нос придают ему вполне характерный вид, не располагающий к светским беседам.",
                'icon' => '<i class="bi-person-fill-exclamation"></i><i class="bi-person-raised-hand fs-3"></i><i class="bi-person-fill-exclamation"></i>',
            ),
            array(
                'name' => 'Crafter',
                'slug' => 'crafter',
                'description' => "This character is definitely engaged in some kind of craft. He is dressed simply and practically, several tool handles shine on his belt, and a heavy bag over his shoulder has a distinctive metal clink.",
                'alt_description' => "Этот персонаж определенно занят каким-то ремеслом. Он одет просто и практично, на поясе блестят несколько рукояток инструментов, а увесистая сумка через плечо характерно озвякивает металлом.",
                'icon' => '<i class="bi-tools"></i><i class="bi-person-standing fs-3"></i><i class="bi-nut-fill"></i>',
            ),
        );
        foreach ($qualities as $quality) {
            Perk::create($quality);
        }
    }
}
