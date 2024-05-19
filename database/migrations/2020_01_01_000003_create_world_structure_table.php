<?php

use App\Models\Worlds\Structure;
use App\Models\Worlds\World;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorldStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('world_structure', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->foreignIdFor(World::class)->unsigned();
            $table->foreignIdFor(Structure::class)->unsigned();
            $table->text('description')->nullable();
            $table->text('alt_description')->nullable();
            $table->smallInteger('position_y')->unsigned();
            $table->smallInteger('position_x')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('world_structure');
    }
}
