<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('use')->nullable();
            $table->string('size')->nullable();
            $table->float('price')->nullable()->unsigned();;
            $table->integer('stock')->nullable()->unsigned();
            $table->tinyInteger('is_bargain')->nullable()->unsigned();
            $table->tinyInteger('is_new_collection')->nullable()->unsigned();
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->tinyInteger('is_active')->nullable()->unsigned();
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('articles');
    }
}
