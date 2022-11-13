<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_request_id');
            $table->text('itemno')->nullable();
            $table->text('quantity')->nullable();
            $table->text('unitissue')->nullable();
            $table->text('itemdescription')->nullable();
            $table->text('estimateunit')->nullable();
            $table->text('estimatecost')->nullable();

            $table->foreign('purchase_request_id')->references('id')->on('purchase_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_request_details');
    }
}
