<?php


namespace App\Models\Squads\Profiles;


use App\Models\Squads\Squad;

class TheLazarettoMobProfile
{
    public int $factionId = 0;
    public array $characterIds = array();

    public function run()
    {
        $factionId = $this->factionId;
        $characterIds = $this->characterIds;

        $squad = new Squad();
        $squad->faction_id = $factionId;
        $squad->name = "The Lazaretto Mob";
        $squad->description = '';
        $squad->banner_id = 1;
        $squad->save();

        foreach($characterIds as $order => $characterId) {
            $squad->characters()->attach($characterId, array('squad_order' => $order));
        }

        return $squad->id;
    }
}
