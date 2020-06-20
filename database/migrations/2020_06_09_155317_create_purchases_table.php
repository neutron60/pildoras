<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('order_number')->nullable()->default(0);
            $table->string('invoice_number')->nullable();
            $table->string('payment_type')->nullable();
            $table->float('amount_paid',11,2)->nullable()->unsigned();
            $table->string('issuing_bank')->nullable();
            $table->string('receiving_bank')->nullable();
            $table->string('payment_day')->nullable();
            $table->string('operation_number')->nullable();
            $table->tinyInteger('verified_payment')->default(0);
            $table->tinyinteger('requires_shipping')->unsigned();
            $table->string('courier_name')->nullable();
            $table->string('courier_office')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_zip_code')->nullable();
            $table->tinyInteger('sent')->default(0);
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
        Schema::dropIfExists('purchases');
    }
}
