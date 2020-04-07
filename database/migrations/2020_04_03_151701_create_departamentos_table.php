<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->nullable();;

            $table->string('departamento1')->nullable();
            $table->string('titulodpto1')->nullable();
            $table->string('descripdpto1')->nullable();
            $table->string('imagendpto1')->nullable();
            $table->string('estadodpto1')->default($value='inactivo');
            $table->string('secc1d1')->nullable();
            $table->string('subsecc1s1d1')->nullable();
            $table->string('subsecc2s1d1')->nullable();
            $table->string('subsecc3s1d1')->nullable();
            $table->string('secc2d1')->nullable();
            $table->string('subsecc1s2d1')->nullable();
            $table->string('subsecc2s2d1')->nullable();
            $table->string('subsecc3s2d1')->nullable();
            $table->string('secc3d1')->nullable();
            $table->string('subsecc1s3d1')->nullable();
            $table->string('subsecc2s3d1')->nullable();
            $table->string('subsecc3s3d1')->nullable();

            $table->string('departamento2')->nullable();
            $table->string('titulodpto2')->nullable();
            $table->string('descripdpto2')->nullable();
            $table->string('imagendpto2')->nullable();
            $table->string('estadodpto2')->default($value='inactivo');
            $table->string('secc1d2')->nullable();
            $table->string('subsecc1s1d2')->nullable();
            $table->string('subsecc2s1d2')->nullable();
            $table->string('subsecc3s1d2')->nullable();
            $table->string('secc2d2')->nullable();
            $table->string('subsecc1s2d2')->nullable();
            $table->string('subsecc2s2d2')->nullable();
            $table->string('subsecc3s2d2')->nullable();
            $table->string('secc3d2')->nullable();
            $table->string('subsecc1s3d2')->nullable();
            $table->string('subsecc2s3d2')->nullable();
            $table->string('subsecc3s3d2')->nullable();

            $table->string('departamento3')->nullable();
            $table->string('titulodpto3')->nullable();
            $table->string('descripdpto3')->nullable();
            $table->string('imagendpto3')->nullable();
            $table->string('estadodpto3')->default($value='inactivo');
            $table->string('secc1d3')->nullable();
            $table->string('subsecc1s1d3')->nullable();
            $table->string('subsecc2s1d3')->nullable();
            $table->string('subsecc3s1d3')->nullable();
            $table->string('secc2d3')->nullable();
            $table->string('subsecc1s2d3')->nullable();
            $table->string('subsecc2s2d3')->nullable();
            $table->string('subsecc3s2d3')->nullable();
            $table->string('secc3d3')->nullable();
            $table->string('subsecc1s3d3')->nullable();
            $table->string('subsecc2s3d3')->nullable();
            $table->string('subsecc3s3d3')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamentos');
    }
}
