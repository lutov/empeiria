<?php


namespace App\Models\Characters\Profiles;


use App\Models\Characters\Character;

class KotezProfile
{

    public int $userId = 0;
    public int $worldId = 0;

    /**
     * @return int
     */
    public function create()
    {
        $userId = $this->userId;
        $worldId = $this->worldId;
        $character = new Character();
        $character->user_id = $userId;
        $character->world_id = $worldId;
        $character->species_id = 1;
        $character->first_name = 'Leopold';
        $character->nickname = 'Feline';
        $character->last_name = 'Kotez';
        $character->sex = 'male';
        $character->age = 153;
        $character->bio = '';
        $character->save();

        $qualities = array(
            1 => 12, // vitality
            2 => 8, // mobility
            3 => 10, // appeal
            4 => 11, // sociality
            5 => 18, // intellect
            6 => 12, // willpower
        ); // 71
        foreach ($qualities as $key => $value) {
            $character->qualities()->attach($key, array('value' => $value));
        }

        $perks = array(
            4, // homebody
            8, // writer
            11, // mage
        );
        $character->perks()->attach($perks);

        return $character->id;
    }

}
