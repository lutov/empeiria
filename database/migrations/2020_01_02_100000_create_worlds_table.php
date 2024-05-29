<?php

use App\Models\Games\Game;
use App\Models\User;
use App\Models\Worlds\Picture;
use Database\Seeders\WorldSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worlds', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->unsigned();
            $table->foreignIdFor(Game::class)->unsigned();
            $table->string('name', 256);
            $table->text('description')->nullable();
            $table->string('seed', 256);
            $table->json('octaves');
            $table->smallInteger('size')->unsigned();
            $table->smallInteger('tile_size')->unsigned();
            $table->smallInteger('scale')->unsigned();
            $table->timestamps();
        });
        $seeder = new WorldSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worlds');
    }
}
