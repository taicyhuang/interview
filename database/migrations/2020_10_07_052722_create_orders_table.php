<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number',50)->comment('入庫單號')->unique();
            $table->string('income')->comment('進貨數量');
            $table->string('duedate')->comment('交期');
            $table->string('note')->comment('備註');
            $table->string('status')->comment('0:一般;1:重工');
            $table->string('warehouse')->comment('入庫倉庫');
            $table->integer('hanger_id')->comment('掛具');

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
        Schema::dropIfExists('orders');
    }
}
