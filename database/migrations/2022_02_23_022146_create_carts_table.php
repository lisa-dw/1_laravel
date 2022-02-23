<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id()->comment('장바구니 번호');
            $table->string('user_userId')->comment('users 테이블의 userId(FK)');
            $table->unsignedBigInteger('product_id')->comment('products 테이블의 id(FK)');
            $table->smallInteger('count')->comment('물품 갯수');

            // 외래키 지정
            $table->foreign('user_userId')->references('userId')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('carts', function (Blueprint $table){
           $table->dropForeign('carts_user_userId_foreign');
           $table->dropForeign('carts_product_id_foreign');
        });
        Schema::dropIfExists('carts');
    }
}
