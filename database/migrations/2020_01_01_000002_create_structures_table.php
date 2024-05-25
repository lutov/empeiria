<?php

use Database\Seeders\StructureSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 256);
            $table->string('slug', 256);
            $table->text('description')->nullable();
            $table->text('alt_description')->nullable();
            $table->smallInteger('frequency')->unsigned();
            $table->smallInteger('start_y')->unsigned();
            $table->smallInteger('start_x')->unsigned();
            $table->smallInteger('size_y')->unsigned();
            $table->smallInteger('size_x')->unsigned();
            $table->json('biomes');
        });
        $seeder = new StructureSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structures');
    }
}
