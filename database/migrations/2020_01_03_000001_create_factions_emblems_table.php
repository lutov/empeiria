<?php

use Database\Seeders\FactionEmblemSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactionsEmblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factions_emblems', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->timestamps();
        });
        $seeder = new FactionEmblemSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factions_emblems');
    }
}
