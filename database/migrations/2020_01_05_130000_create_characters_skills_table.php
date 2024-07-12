<?php

use App\Models\Characters\SkillType;
use Database\Seeders\CharactersSkillsSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SkillType::class, 'skill_type_id')->nullable();
            $table->string('name', 256);
            $table->string('slug', 256)->nullable();
            $table->text('description')->nullable();
            $table->text('alt_description')->nullable();
            $table->smallInteger('cost')->default(0);
            $table->text('icon')->nullable();
        });
        $seeder = new CharactersSkillsSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters_skills');
    }
}
