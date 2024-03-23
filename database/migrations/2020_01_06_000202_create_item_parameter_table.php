<?php

use App\Models\Items\Item;
use App\Models\Items\Parameter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemParameterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_parameter', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class)->unsigned();
            $table->foreignIdFor(Parameter::class, 'parameter_id')->unsigned();
            $table->smallInteger('value')->unsigned()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_parameter');
    }
}
