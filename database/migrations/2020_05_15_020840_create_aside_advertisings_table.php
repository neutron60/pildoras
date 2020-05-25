<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsideAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aside_advertisings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('advertising_text')->nullable();
            $table->string('advertising_image')->nullable();
            $table->string('advertising_url')->nullable();
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
        Schema::dropIfExists('aside_advertisings');
    }
}
