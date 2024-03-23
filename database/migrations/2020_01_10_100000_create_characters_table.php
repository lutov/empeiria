<?php

use App\Models\Characters\Avatar;
use App\Models\Characters\Gender;
use App\Models\Factions\Faction;
use App\Models\Squads\Squad;
use Database\Seeders\DemoCharacterSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name', 256);
            $table->string('nickname', 256)->nullable();
            $table->string('last_name', 256)->nullable();
            $table->text('bio')->nullable();
            $table->smallInteger('age')->unsigned()->nullable();
            $table->foreignIdFor(Gender::class)->unsigned()->default(1);
            $table->foreignIdFor(Avatar::class)->unsigned()->default(1);
            $table->foreignIdFor(Faction::class)->unsigned()->nullable();
            $table->smallInteger('faction_order')->unsigned()->nullable();
            $table->foreignIdFor(Squad::class)->unsigned()->nullable();
            $table->smallInteger('squad_order')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
        $seeder = new DemoCharacterSeeder();
        for ($i = 0; $i < 3; $i++) {
            $seeder->run();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
