<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdersTable extends Migration
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
            $table->string('status')->comment('1:入庫;2:上線;4:上料;8:下料;16:擦包;32:一次性產品')->change();
            $table->tinyInteger('remake')->comment('0:一般;1:重工')->default(0);
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
            $table->string('status')->comment('0:一般;1:重工')->change();
            $table->dropColumn('remake');
        });
    }
}
