<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRpqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pr_id');
            $table->text('name')->nullable();
            $table->text('position')->nullable();
            $table->text('address')->nullable();
            $table->text('items')->nullable();
            $table->text('unit')->nullable();
            $table->text('amount')->nullable();
            $table->text('total')->nullable();
            $table->timestamps();

            $table->foreign('pr_id')->references('id')->on('purchase_requests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpqs');
    }
}
