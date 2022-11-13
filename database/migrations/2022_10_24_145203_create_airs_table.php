<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('supplier')->nullable();
            $table->string('airno')->nullable();
            $table->string('pono')->nullable();
            $table->string('date')->nullable();
            $table->string('invoiceno')->nullable();
            $table->string('date2')->nullable();
            $table->string('rod')->nullable();
            $table->string('acceptance')->nullable();
            $table->string('inspection')->nullable();
            $table->string('dater')->nullable();
            $table->string('datei')->nullable();
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
        Schema::dropIfExists('airs');
    }
}
