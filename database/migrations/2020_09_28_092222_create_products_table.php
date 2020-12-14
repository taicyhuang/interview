<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->comment('產品名稱');
            $table->string('pn', '30')->unique()
                ->comment('產品編號eq:123(客戶代碼)-AA1111');
            $table->string('amount', 30)->comment('金額');
            $table->string('pic', 100)
                ->comment('存放路徑');
            $table->integer('hanger_id')
                ->comment('掛具,0:不使用掛具'); # table -> hanger
            $table->integer('plating_id')->comment('電鍍級'); # table -> platings
            $table->integer('volat')->comment('電壓（app帶回）');
            $table->string('description')->comment('注意事項');
            $table->integer('tonema')
                ->comment('銅碼掛數,只要輸入數字'); # 這邊要能修改
            $table->string('factory',30)->comment('射出廠');
            $table->integer('status')->comment('1:入庫;2:上線;4:上料;8:下料;16:擦包');
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
        Schema::dropIfExists('products');
    }
}
