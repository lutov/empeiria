<?php

use App\Models\Factions\Faction;
use App\Models\Squads\Banner;
use Database\Seeders\SquadSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squads', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Faction::class)->unsigned();
            $table->string('name', 256);
            $table->text('description')->nullable();
            $table->foreignIdFor(Banner::class)->unsigned()->default(1);
            $table->smallInteger('size')->unsigned()->default(5);
            $table->timestamps();
        });
        $seeder = new SquadSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('squads');
    }
}
