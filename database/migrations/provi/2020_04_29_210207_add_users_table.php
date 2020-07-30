<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->after('name');
            $table->bigInteger('role_id')->nullable()->after('lastname')->unsigned();
            $table->string('id_type')->after('email_verified_at')->nullable();
            $table->integer('id_number')->after('id_type')->unsigned()->unique()->nullable();
            $table->string('mobil_phone_code')->after('id_number')->nullable();
            $table->string('mobil_phone')->after('mobil_phone_code')->nullable();
            $table->string('area_code')->after('mobil_phone')->nullable();
            $table->string('phone_number')->after('area_code')->nullable();
            $table->string('address1')->after('phone_number')->nullable();
            $table->string('address2')->after('address1')->nullable();
            $table->string('city')->after('address2')->nullable();
            $table->string('state')->after('city')->nullable();
            $table->string('zip_code')->after('state')->nullable();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['lastname','role_id','id_type','id_number','mobil_phone_code','mobil_phone','area_code','phone_number','address1','address2','city','state','zip_code']);
        });
    }
}
