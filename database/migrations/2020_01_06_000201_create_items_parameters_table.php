<?php

use Database\Seeders\ItemParametersSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('slug', 256);
            $table->text('description')->nullable();
            $table->smallInteger('min')->unsigned()->default(1);
            $table->smallInteger('max')->unsigned()->default(10);
            $table->timestamps();
        });
        $seeder = new ItemParametersSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_parameters');
    }
}
