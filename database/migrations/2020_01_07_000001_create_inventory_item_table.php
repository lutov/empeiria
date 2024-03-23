<?php

use App\Models\Characters\Inventory;
use App\Models\Items\Item;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_item', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inventory::class)->unsigned();
            $table->foreignIdFor(Item::class)->unsigned();
            $table->smallInteger('quantity')->unsigned()->default(1);
            $table->smallInteger('sort')->unsigned()->default(1);
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
        Schema::dropIfExists('inventory_item');
    }
}
