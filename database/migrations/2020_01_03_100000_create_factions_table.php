<?php

use App\Models\Factions\Emblem;
use App\Models\Worlds\World;
use Database\Seeders\FactionSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(World::class)->unsigned();
            $table->string('name', 256);
            $table->text('description')->nullable();
            $table->foreignIdFor(Emblem::class)->unsigned()->default(1);
            $table->timestamps();
        });
        $seeder = new FactionSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factions');
    }
}
