<?php

use App\Models\Squads\Squad;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_position', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Squad::class)->unsigned();
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
        Schema::dropIfExists('squad_position');
    }
}
