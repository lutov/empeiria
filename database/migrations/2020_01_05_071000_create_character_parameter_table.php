<?php

use App\Models\Characters\Character;
use App\Models\Characters\Parameter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_parameter', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Character::class)->unsigned();
            $table->foreignIdFor(Parameter::class)->unsigned();
            $table->smallInteger('value')->unsigned()->default(100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_parameter');
    }
}
