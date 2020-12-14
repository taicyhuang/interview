<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlertProductsTable extends Migration
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
            $table->string('amount', 30)->null()->change();
            $table->integer('volat')->null()->change();
            $table->string('description')->null()->change();
            $table->string('factory')->null()->change();
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
            $table->string('amount', 30)->notnull()->change();
            $table->integer('volat')->notnull()->change();
            $table->string('description')->notnull()->change();
        });
    }
}
