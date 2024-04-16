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
                'description' => "Humans make up the overwhelming majority among the intelligent species inhabiting the tiers, so it is not an exaggeration to say that the structure of the modern world is known to us precisely through the vision of mankind. Although the origins of man remain the subject of heated debate in the scientific community, the public consensus is that humans have existed at least since the Sun shone at the center of the world. Although their fates have been intertwined with the grim people since ancient times, these two species have never merged into one, and with the appearance of the albions in the world, the future of humanity becomes increasingly uncertain.

Humans are humanoids that exhibit amazing diversity within the species. Their appearance and physical characteristics vary much more than one would expect from creatures that have lived for millennia in the same conditions and were exposed to the same environmental factors, giving rise to different theories about the role of man in this world. One way or another, the color of skin, hair, height and physique of people can be very diverse, although the influence of heredity within families works in the expected way, i.e. close relatives always share common traits, and the descendants of people with different phenotypes inherit the traits of both parents to approximately equal extent.",
                'alt_description' => "Люди составляют подавляющее большинство среди разумных видов, населяющих ярусы, поэтому не будет преувеличением сказать что устройство своременного мира известно нам именно через видение людей. Хотя происхождение человека остается предметом жарких дебатов в научной среде, общественный консенсус гласит, что люди существуют как минимум с тех пор, когда Солнце засияло в центре мира. Хотя их судьбы издревне переплетены с народом гримов, два этих вида никогда не сливались в один, а с появлением в мире альбионов будущее человечества становится все более неопределенным.

Люди - гуманоиды, демонстрирующие удивительное разнообразие внутри вида. Их внешность и физические данные варьируются гораздо сильнее, чем можно было бы ожидать от существ, которые тысячелетиями жили в одинаковых условиях и подвергались одним и тем же факторам внешней среды, что порождает различные теории о роли человека в этом мире. Так или иначе, цвет кожи, волос, рост и телосложение людей может быть самым разнообразным, хотя влияние наследственности внутри семей работает ожидамым образом, т.е. близкие родственники всегда имеют общие черты, а потомки людей с разными фенотипами наследуют черты обоих родителей примерно в равной степени.",
                'icon' => '',
                'parent_id' => null,
            ),
            array(
                'name' => 'Grim',
                'slug' => 'grim',
                'description' => "The grims are one of three sentient species on the Tiers, but unlike the аlbions, humans have lived side by side with them since the beginning of known history, often mingling but never completely dissolving into each other. Although in the modern world there are not many differences between men and grims, in the past their customs became a reason for conflicts and even wars.

Grims are physically robust and massive humanoids with dark skin tones, most often bluish, red or gray, but their features are on average less varied than those of humans, although much more pronounced than those of albions. Among grims, anomalies are born more often than among other species - children are unusually large or short, mutations such as additional limbs are not uncommon, there are even cases of the birth of two-headed children, however, most often such children are healthy and can leave offspring. How comfortable they are to live with such features is a separate question.

Another feature that people most often consider sinister is their reaction to magic. Most grims by nature have some kind of resistance to magic; the doctor has to spend much more effort on their treatment than in the case of humans. They themselves either have no ability for magic at all, or are limited to the most minimal abilities, which, for example, greatly increases the importance of traditional medicine for grims using exclusively medicinal substances and procedures without the use of magic. The profession of a doctor is one of the most valuable and respected for them.

However, despite the resistance, contact with magic still does not pass without a trace for them. The phenomenon of Transformation is known, although not fully studied, in which grim, after being exposed to magic for a long time, begins to change physically and mentally. Most often, the Transformation was described during bloody battles, when grim soldiers, after severe wounds and magical treatment, began to acquire features somewhat reminiscent of insects - their skin became rougher, covered with strange growths, and their facial features were frighteningly distorted. Their personalities also changed, they became more and more cruel and aggressive and eventually, as a rule, went crazy and attacked their own people, fighting until they were literally cut into pieces. Witnesses often described how the unfortunates in their last moment looked more like beetles than intelligent creatures.

Having learned about this curse, the majority of the grims decided to abandon magic, and this in turn did not allow them to live freely in human settlements, where the magician is most often one of the main members of society. Therefore, over time, the grims began to found their own closed settlements, or inhabit separate quarters of large cities, where only those people who agreed to live without magic were allowed.",
                'alt_description' => "Гримы - один из трех разумных видов на ярусах, но, в отличие от альбионов, люди жили с ними бок о бок с начала известной истории, часто смешиваясь, но никогда окончательно не растворясь друг в друге. Хотя в современном мире между людьми и гримами не так много отличий, в прошлом их особенности становились поводом для конфликтов и даже войн.

Гримы - физически крепкие и массивные гуманоиды с темным оттенком кожи, чаще всего синеватого, красного или серого цвета, но их черты в среднем менее разнообразны, чем у людей, хотя и намного более выражены, чем у альбионов. Среди гримов чаще чем среди других видов рождаются аномалии - дети необычно крупные, или малорослые, нередки мутации вроде дополнительных конечностей, известны даже случаи рождения двухголовых детей, при этом, чаще всего такие дети здоровы и могут оставлять потомство. Насколько комфортно им жить с такими особенностями - отдельный вопрос.

Еще одной особенностью, которую люди чаще всего считают зловещей, является их реакция на магию. Большинство гримов от природы имеет что-то вроде сопротивления к магии, на их лечение врачу приходится тратить сил намного больше, чем в случае с людьми. Сами они или не имеют способностей к магии вовсе, или ограничены самыми минимальными способностями, что, например, сильно повышает значимость для гримов традиционной медицины с применением исключительно лекарственных веществ и процедур без использования магии. Профессия доктора является для них одной из самых ценных и уважаемых.

Однако, несмотря на сопротивление, соприкосновение с магией все-таки не проходит для них бесследно. Известен, хотя и не до конца изучен феномен Превращения, при котором грим, длительное время подвергавшися воздействию магии, начинает изменяться физически и психически. Чаще всего Превращение описывали во времена кровопролитных сражений, когда солдаты-гримы после тяжелых ранений и магического лечения начинали приобретать черты, несколько напоминающие насекомых - их кожные покровы грубели, покрывались странными наростами, черты лица пугающе искажались. Менялись и их личности, они становились все более жестокими и агрессивными и в конечном итоге как правило сходили с ума и нападали на своих же, сражаясь до тех пор, пока их буквально не разрубят на куски. Свидетели часто описывали, что несчастные в свой последний миг больше походили на жуков, чем на разумных созданий.

Узнав об этом проклятии, гримы в большинстве приняли решение отказаться от магии, а это в свою очередь не позволяло им свободно жить в человеческих поселениях, где маг чаще всего является одним из главных членов общества. Поэтому со временем гримы стали основывать собственные закрытые поселения, либо населять отдельные кварталы крупных городов, куда допускали только тех людей, которые соглашались жить без магии.",
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
