<?php

use App\Models\Squads\Parameter;
use App\Models\Squads\Squad;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_parameter', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Squad::class)->unsigned();
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
        Schema::dropIfExists('squad_parameter');
    }
}
