<?php

use Database\Seeders\NameSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 256);
            $table->boolean('first_name')->nullable()->default(0);
            $table->boolean('nickname')->nullable()->default(0);
            $table->boolean('last_name')->nullable()->default(0);
            $table->boolean('none')->nullable()->default(0);
            $table->boolean('male')->nullable()->default(0);
            $table->boolean('female')->nullable()->default(0);
            $table->boolean('world')->nullable()->default(0);
            $table->boolean('region')->nullable()->default(0);
            $table->boolean('city')->nullable()->default(0);
            $table->boolean('faction')->nullable()->default(0);
            $table->boolean('squad')->nullable()->default(0);
            $table->boolean('item')->nullable()->default(0);
            $table->timestamps();
        });
        $seeder = new NameSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('names');
    }
}
