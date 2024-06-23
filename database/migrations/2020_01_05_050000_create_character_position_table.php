<?php

use App\Models\Characters\Character;
use App\Models\Characters\Perk;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_position', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Character::class)->unsigned();
            $table->tinyInteger('y')->default(0);
            $table->tinyInteger('x')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_position');
    }
}
