<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeanProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bean_products', function (Blueprint $table) {
            $table->id();
            $table->string('bean_name');
            $table->string('grade')->nullable();
            $table->smallInteger('price');
            $table->string('title')->nullable();
            $table->text('contents');

            $table->string('processed')->nullable();
            $table->string('made_date')->nullable();
            $table->string('input_date')->nullable();
            $table->string('farm')->nullable();
            $table->string('continent');
            $table->string('country');
            $table->string('bean_image')->nullable();

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
        Schema::dropIfExists('bean_products');
    }
}
