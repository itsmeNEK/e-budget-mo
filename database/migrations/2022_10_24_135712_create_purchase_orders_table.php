<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('supplier')->nullable();
            $table->string('address')->nullable();
            $table->string('pono')->nullable();
            $table->string('modeproc')->nullable();
            $table->string('date')->nullable();
            $table->string('prno')->nullable();
            $table->string('placedelivery')->nullable();
            $table->string('deliveryterm')->nullable();
            $table->string('datedelivery')->nullable();
            $table->string('paymentterms')->nullable();
            $table->string('totalamount')->nullable();
            $table->string('totalamountW')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('purchase_orders');
    }
}
