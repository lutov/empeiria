<?php

use Database\Seeders\CharacterSpeciesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_species', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('slug', 256)->nullable();
            $table->text('description')->nullable();
            $table->text('alt_description')->nullable();
            $table->text('icon')->nullable();
            $table->foreignId('parent_id')->unsigned()->nullable();
        });
        $seeder = new CharacterSpeciesSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters_species');
    }
}
