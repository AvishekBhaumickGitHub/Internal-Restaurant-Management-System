<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('menu_id');
            $table->string('menu_name');
            $table->decimal('price', 8, 2);
            $table->integer('qty');
			$table->string('category');
            $table->integer('total_price');
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lists');
    }
}