<?php

use App\Models\Characters\Character;
use App\Models\Squads\Squad;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_character', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Squad::class)->unsigned();
            $table->foreignIdFor(Character::class)->unsigned();
            $table->smallInteger('squad_order')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('squad_character');
    }
}
