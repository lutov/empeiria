<?php


namespace App\Models\Factions\Profiles;


use App\Models\Factions\Faction;

class OutcastsProfile
{
    public int $worldId = 0;

    public function create()
    {
        $worldId = $this->worldId;
        $faction = new Faction();
        $faction->world_id = $worldId;
        $faction->name = 'Outcasts';
        $faction->description = '';
        $faction->emblem_id = 1;
        $faction->player_faction = true;
        $faction->save();

        return $faction->id;
    }
}
