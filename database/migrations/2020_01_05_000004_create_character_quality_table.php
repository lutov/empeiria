<?php

use App\Models\Characters\Character;
use App\Models\Characters\Quality;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_quality', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Character::class)->unsigned();
            $table->foreignIdFor(Quality::class)->unsigned();
            $table->smallInteger('value')->unsigned()->default(1);
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
