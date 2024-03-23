<?php

use Database\Seeders\ItemAttributesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('slug', 256);
            $table->text('description')->nullable();
            $table->timestamps();
        });
        $seeder = new ItemAttributesSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_attributes');
    }
}
