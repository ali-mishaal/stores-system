<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('billhs_id');
            $table->integer('item_id');
            $table->integer('store_id');
            $table->integer('quantity');
            $table->float('price');
            $table->float('total');
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
        Schema::dropIfExists('billds');
    }
}
