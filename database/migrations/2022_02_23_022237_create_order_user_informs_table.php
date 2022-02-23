<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderUserInformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderUserInforms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->comment('주문번호(FK): orders 테이블의 id');
            $table->string('user_id')->comment('유저 아이디(FK): users 테이블의 id');
            $table->string('name')->comment('주문자 이름');
            $table->string('phone')->comment('주문자 전화번호');
            $table->string('zip')->comment('주문자 우편번호');
            $table->string('address')->comment('주문자 배송지');
            $table->string('subAdress')->comment('주문자 상세 배송지');

            //외래키 선언
            $table->foreign('order_id')->references('id')->on('orders')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::table('orderUserInforms', function (Blueprint $table){
           $table->dropForeign('order_id');
           $table->dropForeign('user_id');
        });
        Schema::dropIfExists('orderUserInforms');
    }
}
