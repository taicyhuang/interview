<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 30)
                ->unique()
                ->comment('公司代碼,第一次建立資料夾,客戶代碼自行輸入');
            $table->string('name', 30)
                ->comment('公司名稱');
            $table->string('tax', 30)
                ->comment('統一編號');
            $table->string('mobile', 30);
            $table->string('fax', 30);
            $table->string('address', 30)
                ->comment('地址');
            $table->string('contact', 30)
                ->comment('負責人');
            $table->integer('defective_rate')
                ->comment('不良率');
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
        Schema::dropIfExists('customers');
    }
}
