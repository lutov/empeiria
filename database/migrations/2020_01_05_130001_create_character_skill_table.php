<?php

use App\Models\Characters\Character;
use App\Models\Characters\Skill;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Character::class)->unsigned();
            $table->foreignIdFor(Skill::class)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_skill');
    }
}
