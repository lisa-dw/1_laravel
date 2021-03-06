<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('user_userid');

            $table->foreign('user_userid')->references('userid')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('imgSrc')->nullable();

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
        Schema::table('informs', function (Blueprint $table){
            $table->dropForeign('informs_user_userid_foreign');
        });

        Schema::dropIfExists('informs');
    }
}
