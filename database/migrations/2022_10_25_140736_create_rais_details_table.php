<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaisDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rais_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rais_id');
            $table->text('balancestock')->nullable();
            $table->text('quantity')->nullable();
            $table->text('unitissue')->nullable();
            $table->text('itemdescription')->nullable();
            $table->text('estimateunit')->nullable();
            $table->text('estimatecost')->nullable();

            $table->foreign('rais_id')->references('id')->on('rais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rais_details');
    }
}
