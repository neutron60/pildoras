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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('use')->nullable();
            $table->string('size')->nullable();
            $table->float('price')->nullable();
            $table->integer('stock')->nullable()->unsigned();
            $table->integer('section_id')->nullable();
            $table->string('status')->default($value='inactivo');
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
