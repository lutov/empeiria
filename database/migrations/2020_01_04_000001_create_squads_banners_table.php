<?php

use Database\Seeders\SquadBannerSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadsBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squads_banners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->timestamps();
        });
        $seeder = new SquadBannerSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('squads_banners');
    }
}
