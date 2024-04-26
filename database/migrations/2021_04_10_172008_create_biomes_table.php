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
            $table->string('slug', 256);
            $table->text('description')->nullable();
            $table->text('alt_description')->nullable();
            $table->smallInteger('height');
            $table->boolean('passable');
            $table->smallInteger('energy_cost');
            $table->boolean('solid');
            $table->boolean('liquid');
            $table->boolean('gas');
            $table->boolean('plasma');
            $table->smallInteger('red');
            $table->smallInteger('green');
            $table->smallInteger('blue');
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
