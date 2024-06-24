<?php

use Database\Seeders\CharactersParametersSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('slug', 256)->nullable();
            $table->text('description')->nullable();
            $table->text('alt_description')->nullable();
            $table->smallInteger('default_value')->unsigned()->default(0);
        });
        $seeder = new CharactersParametersSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters_parameters');
    }
}
