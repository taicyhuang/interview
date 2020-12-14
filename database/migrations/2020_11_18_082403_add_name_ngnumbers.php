<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameNgnumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ngnumbers', function (Blueprint $table) {
            //
            $table->id()->increments('id')->change();
            $table->string('ng_info',250)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ngnumbers', function (Blueprint $table) {
            //
            $table->increments('id')->id()->change();
            $table->dropColumn('ng_info');
        });
    }
}
