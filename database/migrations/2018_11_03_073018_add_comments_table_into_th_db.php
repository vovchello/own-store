<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsTableIntoThDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function(Blueprint $table){
            $table->increments('id');
            $table->text('description');
            $table->integer('product_id')->nullable()->unsigned();
            $table->unsignedInteger('user_id');
            $table->timestamps();

        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('comments',function (Blueprint $table){
            $table->dropForeign('comments_product_id_foreign');
        });

        Schema::table('comments',function (Blueprint $table){
            $table->dropForeign('comments_user_id_foreign');
        });

        Schema::dropIfExists('comments');


    }
}
