<?php

use App\Models\Characters\Character;
use App\Models\Characters\Quality;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_qualities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Character::class)->unsigned();
            $qualities = Quality::all();
            foreach ($qualities as $quality) {
                $table->smallInteger($quality->slug)->unsigned()->default(1);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_qualities');
    }
}
