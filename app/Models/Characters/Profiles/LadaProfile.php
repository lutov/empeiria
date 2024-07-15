<?php


namespace App\Models\Characters\Profiles;


use App\Models\Characters\Character;

class LadaProfile
{

    public int $userId = 0;
    public int $worldId = 0;

    public function create()
    {
        $userId = $this->userId;
        $worldId = $this->worldId;
        $character = new Character();
        $character->user_id = $userId;
        $character->world_id = $worldId;
        $character->species_id = 1;
        $character->first_name = 'Lada';
        $character->nickname = 'Sova';
        $character->last_name = 'Sovaroga';
        $character->sex = 'female';
        $character->age = 32;
        $character->bio = '';
        $character->save();

        $qualities = array(
            1 => 13, // vitality
            2 => 11, // mobility
            3 => 13, // appeal
            4 => 12, // sociality
            5 => 10, // intellect
            6 => 11, // willpower
        );
        foreach ($qualities as $key => $value) {
            $character->qualities()->attach($key, array('value' => $value));
        }

        $perks = array(
            1, // tall
            3, // traveller
            7, // musician
            10, // crippled
        );
        $character->perks()->attach($perks);
    }

}
