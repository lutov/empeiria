<?php

namespace Database\Seeders;

use App\Models\Characters\Species;
use Illuminate\Database\Seeder;

class CharacterSpeciesSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $species = array(
            array(
                'name' => 'Albion',
                'slug' => 'albion',
                'description' => "Albions are the mysterious inhabitants of the upper tiers, which were discovered several hundred years ago by an expedition of the Guardians of the Summit. Before this episode, no one doubted that there were only two intelligent species in the world - humans and grims - but the discovery turned previous ideas on their head. Even conspiracy theories have emerged suggesting that the аlbions are the aborigines of this world, and that other species are aliens from distant stars.

Albions are humanoids that are very similar in appearance to humans; they are of average height and build, with pale skin and very light eyes and hair. Both humans and grims find аlbions extremely attractive, however, аlbions are so similar to each other that most representatives of other species cannot distinguish them from each other. Albions themselves, although they are capable of recognizing individual representatives of their species, as a rule, do not attach significant importance to this. Their society is radically different from the society of people or grims due to their strong abilities for magic, excellent health and unpretentiousness in everyday life. Before meeting the inhabitants of the lower tiers, the аlbions may have wandered for thousands of years, leaving no capital structures, no tools, or other reliable traces of their existence, easily moving from their place if circumstances forced them to do so. And even this information is known to scientists thanks to the oral stories of the oldest аlbions, because their species did not create writing, and history was never something important for them.",
                'alt_description' => "Альбионы - таинственные обитатели верхних ярусов, которых несколько сотен лет назад обнаружила экспедиция Стражей Вершины. До этого эпизода никто не сомневался, что в мире есть только два разумных вида - люди и гримы - но открытие перевернуло все прошлые представления с ног на голову. Возникли даже теории заговора, предполагающие, что именно альбионы - аборигены этого мира, а другие виды - пришельцы с далеких звезд.

Альбионы - гуманоиды, внешне очень похожие на людей, они среднего роста и телосложения, с бледной кожей и очень светлыми глазами и волосами. И люди, и гримы считают альбионов крайне привлекательными, однако, альбионы настолько похожи между собой, что большинство представителей других видов не может отличить их друг от друга. Сами альбионы, хотя и способны узнавать отдельныхпредставителей своего вида, как правило, не придают этому существенного значения. Их общество радикально отличается от общества людей или гримов благодаря сильнейшим способностям к магии, великолепному здоровью и неприхотливости в быту. До встречи с обитетелями нижних ярусов альбионы возможно тысячелетиями кочевали, не оставляя ни капитальных сооружений, ни орудий труда, ни других достоверных следов своего существования, легко снимаясь с места, если обстоятельства их к этому вынуждали. И даже эти сведения о  известны ученым благодаря устным рассказам старейших альбионов, потому что их вид не создал письменности, а история никогда не была для них чем-то важным.",
                'icon' => '',
                'parent_id' => null,
            ),
            array(
                'name' => 'Human',
                'slug' => 'human',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
                'parent_id' => null,
            ),
            array(
                'name' => 'Grim',
                'slug' => 'grim',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
                'parent_id' => null,
            ),
            array(
                'name' => 'Hybrid',
                'slug' => 'hybrid',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
                'parent_id' => null,
            ),
            array(
                'name' => 'Hybrid',
                'slug' => 'hybrid',
                'description' => "",
                'alt_description' => "",
                'icon' => '',
                'parent_id' => 4,
            ),
        );
        foreach ($species as $key => $values) {
            Species::create($values);
        }
    }
}
