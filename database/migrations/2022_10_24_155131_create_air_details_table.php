<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('air_id');
            $table->string('itemno')->nullable();
            $table->string('unit')->nullable();
            $table->text('itemdescription')->nullable();
            $table->integer('quantity')->nullable();

            $table->foreign('air_id')->references('id')->on('airs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('air_details');
    }
}
