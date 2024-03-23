<?php

use App\Models\Characters\Gender;
use Database\Seeders\CharacterAvatarSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_avatars', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Gender::class)->default(1);
            $table->string('name', 256);
            $table->timestamps();
        });
        $seeder = new CharacterAvatarSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters_avatars');
    }
}
