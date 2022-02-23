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
            $table->id();
            $table->string('product_id')->comment('제품명 (FK)');
            $table->smallInteger('count')->comment('제품 갯수');
            $table->smallInteger('price')->comment('총 주문 가격');

            $table->string('orderStatus')->comment('주문 처리 상태');

            //외래키 선언
            $table->foreign('product_id')->references('id')->on('product')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::table('orders', function (Blueprint $table){
           $table->dropForeign('orders_product_id_foreign');
        });
        Schema::dropIfExists('orders');
    }
}
