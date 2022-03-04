<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyUserInformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_user_informs', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('buy_list_id')->comment('주문번호(FK): orders 테이블의 id');
            $table->unsignedBigInteger('user_id')->comment('유저 아이디(FK): users 테이블의 id');
            $table->string('order_num')->comment('주문 번호');
            $table->string('name')->nullable()->comment('주문자 이름');
            $table->string('phone')->nullable()->comment('주문자 전화번호');
            $table->string('zip')->nullable()->comment('주문자 우편번호');
            $table->string('address')->nullable()->comment('주문자 배송지');
            $table->string('subAdress')->nullable()->comment('주문자 상세 배송지');

            //외래키 선언
//            $table->foreign('buy_list_id')->references('id')->on('buy_lists')
//                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::table('buy_user_informs', function (Blueprint $table){
            $table->dropForeign('buy_user_informs_buy_list_id_foreign');
//            $table->dropForeign('buy_user_informs_user_id_foreign');
        });
        Schema::dropIfExists('buy_user_informs');
    }
}
