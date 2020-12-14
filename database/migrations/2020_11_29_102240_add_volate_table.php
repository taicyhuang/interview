<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVolateTable extends Migration
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
            $table->string('cu');
            $table->string('h_ni');
            $table->string('full_ni');
            $table->string('m_ni');
            $table->string('cr');
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
            $table->dropColumn('cu');
            $table->dropColumn('h_ni');
            $table->dropColumn('full_ni');
            $table->dropColumn('m_ni');
            $table->dropColumn('cr');
        });
    }
}
