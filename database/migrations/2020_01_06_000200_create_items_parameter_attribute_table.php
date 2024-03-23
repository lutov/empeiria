<?php

use App\Models\Items\Attribute;
use App\Models\Items\Parameter;
use Database\Seeders\ItemParametersSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsParameterAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_parameter_attribute', function (Blueprint $table) {
            $table->foreignIdFor(Parameter::class, 'parameter_id')->unsigned();
            $table->foreignIdFor(Attribute::class, 'attribute_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_parameter_attribute');
    }
}
