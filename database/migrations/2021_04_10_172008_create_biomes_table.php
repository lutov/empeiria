<?php

use Database\Seeders\BiomeSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biomes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->smallInteger('height_min');
            $table->smallInteger('height_max');
            $table->smallInteger('temperature_min');
            $table->smallInteger('temperature_max');
            $table->smallInteger('humidity_min');
            $table->smallInteger('humidity_max');
            $table->string('color', 256);
            $table->timestamps();
        });
        $seeder = new BiomeSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biomes');
    }
}
