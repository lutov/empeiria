<?php

use App\Models\Items\Item;
use App\Models\Items\Attribute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_attribute', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Item::class)->unsigned();
            $table->foreignIdFor(Attribute::class, 'attribute_id')->unsigned();
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
        Schema::dropIfExists('item_attribute');
    }
}
