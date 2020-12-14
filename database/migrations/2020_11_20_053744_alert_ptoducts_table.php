<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlertPtoductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn('hanger_id');
            $table->dropColumn('plating_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->integer('plating_id')->comment('電鍍級'); # table -> platings
            $table->integer('hanger_id')
                ->comment('掛具,0:不使用掛具'); # table -> hanger
        });
    }
}
