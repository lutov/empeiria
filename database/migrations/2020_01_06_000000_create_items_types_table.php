<?php

use App\Models\Items\Type;
use Database\Seeders\ItemTypeSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_types', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Type::class, 'parent_id')->unsigned()->nullable();
            $table->string('name', 256);
            $table->text('description')->nullable();
            $table->timestamps();
        });
        $seeder = new ItemTypeSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_types');
    }
}
