<?php

namespace Database\Seeders;

use App\Models\Characters\Quality;
use Illuminate\Database\Seeder;

class CharactersQualitiesSeeder extends Seeder
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
                'name' => 'Vitality',
                'slug' => 'vitality',
                'description' => "Vitality is a quality that describes a character's ability to endure life's difficulties and overcome obstacles in the most literal sense, physically. Vital characters are usually good in battle and work. They adhere to traditional values and like simple, reliable things.",
                'alt_description' => "Витальность — это качество, которое описывает способность персонажа переносить жизненные трудности и преодолевать препятствия в самом буквальном понимании, физически. Витальные персонажи как правило хороши в бою и труде. Они придерживаются традиционных ценностей и любят простые, надежные вещи.",
                'default_value' => 5,
            ),
            array(
                'name' => 'Mobility',
                'slug' => 'mobility',
                'description' => "Mobility is a quality that describes a character's agility, literally and figuratively. Mobile characters are fast and resilient, prone to changing places and frequent changes in general. At the same time, their attachments may lack depth, they find it difficult to focus on one task for a long time, and they have difficulty enduring any routine.",
                'alt_description' => "Мобильность — это качество, которое описывает подвижность персонажа в прямом и переносном смысле. Мобильные персонажи быстры и выносливы, склонны к перемене мест и частым переменам в целом. При этом их привязанностям может недоставать глубины, им сложно долго фокусироваться на одной задаче и они с трудом переносят любую рутину.",
                'default_value' => 5,
            ),
            array(
                'name' => 'Appeal',
                'slug' => 'appeal',
                'description' => "Attractiveness is a quality that describes a character's ability to be liked by others, which includes both physical beauty, the ability to look and behave appropriately for the situation, and personality traits that are assessed by others as positive. Attractive characters have advantages in almost any endeavor, especially in the early stages. But the power of attraction can cause a character to neglect any other qualities, which can lead to disaster.",
                'alt_description' => "Привлекательность — это качество, которое описывает способность персонажа нравиться другим, что включает как физическую красоту, умение выглядеть и вести себя уместно ситуации, так и свойства личности, которые оцениваются окружающими как положительные. Привлекательные персонажи имеют преимущества практически в любом начинании, особенно на начальном этапе. Но сила привлекательности может привести к тому, что персонаж будет пренебрегать любыми другими качествами, что может привести к беде.",
                'default_value' => 5,
            ),
            array(
                'name' => 'Sociality',
                'slug' => 'sociality',
                'description' => "Sociality is a quality of a character that describes his attitude to society, a sense of community, the need for communication and joint activities. Social characters feel deeply connected to their family, friends, and acquaintances. They can have a hard time with loneliness and seek company whenever possible.",
                'alt_description' => "Социальность — это качество персонажа, которое описывает его отношение к социуму, чувство общности, потребность в общении и совместной деятельности. Социальные персонажи чувствуют глубокую связь со своей семьей, друзьями и знакомыми. Они могут тяжело переносить одиночество и при любой возможности ищут компанию.",
                'default_value' => 5,
            ),
            array(
                'name' => 'Intellect',
                'slug' => 'intellect',
                'description' => "Intelligence is a quality of a character that describes his mental abilities, outlook, experience and life wisdom. Intellectual characters are often interested in abstract and hypothetical questions; their behavior can be motivated by rather complex ethical systems that are not always directly based on personal experience. Because of this, intelligent characters may have difficulty communicating with those who do not share or understand their interests.",
                'alt_description' => "Интеллект — это качество персонажа, описывающее его умственные способности, кругозор, опыт и жизненную мудрость. Интеллектуальные персонажи часто интерсесуются абстрактными и гипотетическими вопросами, их поведение может быть мотивировано достаточно сложными этическими системами, не всегда непосредственно опирающимися на личный опыт. Из-за этого интеллектуальные персонажи могут испытывать сложности в общении с теми, кто не разделяет и не понимает их интересы.",
                'default_value' => 5,
            ),
            array(
                'name' => 'Willpower',
                'slug' => 'willpower',
                'description' => "Willpower is a quality of a character that describes his ability to maintain his attention on a specific task despite external and internal obstacles. Strong-willed characters endure temptations, losses, and suffering if their goal requires it. Thanks to this, they often succeed and occupy a prominent place in society. But others may consider them too tough or even cruel, and situations that require compromise often baffle them.",
                'alt_description' => "Сила воли — это качество персонажа, описывающее его способность удерживать свое внимание на определенной задаче вопреки внешним и внутренним преградам. Волевые персонажи стойко переносят соблазны, потери и страдания, если этого требует их цель. Благодаря этому они часто преуспевают и занимают заметное место в обществе. Но окружающие могут считать их слишком жесткими или даже жестокими, а ситуации, требующие компромисса, часто ставят их в тупик.",
                'default_value' => 5,
            ),
        );
        foreach ($qualities as $quality) {
            Quality::create($quality);
        }
    }
}
