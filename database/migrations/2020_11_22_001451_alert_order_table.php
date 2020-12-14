<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlertOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn('hanger_id');
            $table->dropColumn('income');
            $table->integer('customer_id')->after('number');
            $table->string('quantity')->comment('進貨數量');
            $table->string('unit')->comment('0:個;1:模');
            $table->integer('product_id');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->integer('hanger_id')->comment('掛具');
            $table->string('income')->comment('進貨數量');
            $table->dropColumn('customer_id');
            $table->dropColumn('quantity');
            $table->dropColumn('unit');
            $table->dropColumn('product_id');

        });
    }
}
