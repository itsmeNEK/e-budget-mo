<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('department')->nullable();
            $table->string('section')->nullable();
            $table->string('prno')->nullable();
            $table->string('saino')->nullable();
            $table->string('alobsno')->nullable();
            $table->string('date1')->nullable();
            $table->string('date2')->nullable();
            $table->string('date3')->nullable();
            $table->string('purpose')->nullable();
            $table->string('status')->default('0')->comment('0:active 1:accepted 2:reject');
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
        Schema::dropIfExists('purchase_requests');
    }
}
