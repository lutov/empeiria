<?php

use Database\Seeders\WorldPictureSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorldsPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worlds_pictures', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->timestamps();
        });
        $seeder = new WorldPictureSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worlds_pictures');
    }
}
