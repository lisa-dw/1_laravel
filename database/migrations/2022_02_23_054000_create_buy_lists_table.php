<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->comment('제품의 id (FK)');
            $table->unsignedBigInteger('count')->comment('제품 갯수');
            $table->unsignedBigInteger('price')->comment('총 주문 가격');
            $table->unsignedBigInteger('orderStatus')->nullable()->comment('주문 처리 상태');

            //외래키 선언
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::table('buy_lists', function (Blueprint $table){
            $table->dropForeign('buy_lists_product_id_foreign');
        });
        Schema::dropIfExists('buy_lists');
    }
}
