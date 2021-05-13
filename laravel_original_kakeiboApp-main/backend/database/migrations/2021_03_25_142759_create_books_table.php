<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable(); //　nullableは後で消す
            $table->bigInteger('category_id')->unsigned();
            $table->string('content');
            $table->integer('year');
            $table->integer('month');
            $table->integer('date');
            $table->integer('inout'); //収支
            $table->integer('amount');
            $table->string('memo', 50)->nullable();
            $table->integer('delflag')->default(0);
            $table->timestamps();

            // 外部キーを設定
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
