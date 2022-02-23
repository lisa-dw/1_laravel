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
            $table->id();                                          // 제품 고유 번호(PK)
            $table->string('productName')->nullable();     // 제품명
            $table->unsignedBigInteger('price')->nullable();      // 제품 가격
            $table->unsignedBigInteger('stock')->nullable();      // 제품 재고 수량

            $table->string('title')->nullable();             // 공동구매 글 제목
            $table->text('contents')->nullable();            //    -    글 내용
            $table->string('productImage')->nullable();        // 제품 이미지

            $table->string('grade')->nullable();              // 생두 등급

//            $table->string('continent')->nullable();      // 카테고리1
//            $table->string('country')->nullable();        // 카테고리2

//            $table->integer('imgSize')->nullable();
//            $table->string('made_date')->nullable();
//            $table->string('processed')->nullable();
//            $table->string('input_date')->nullable();
//            $table->string('farm')->nullable();


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
