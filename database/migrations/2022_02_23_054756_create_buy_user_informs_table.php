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
        Schema::create('buyUserInforms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyList_id')->comment('주문번호(FK): orders 테이블의 id');
            $table->unsignedBigInteger('user_id')->comment('유저 아이디(FK): users 테이블의 id');
            $table->string('name')->nullable()->comment('주문자 이름');
            $table->string('phone')->nullable()->comment('주문자 전화번호');
            $table->string('zip')->nullable()->comment('주문자 우편번호');
            $table->string('address')->nullable()->comment('주문자 배송지');
            $table->string('subAdress')->nullable()->comment('주문자 상세 배송지');

            //외래키 선언
            $table->foreign('buyList_id')->references('id')->on('buyLists')
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
        Schema::table('buyUserInforms', function (Blueprint $table){
            $table->dropForeign('buyUserInforms_buyList_id_foreign');
            $table->dropForeign('buyUserInforms_user_id_foreign');
        });
        Schema::dropIfExists('buyUserInforms');
    }
}
