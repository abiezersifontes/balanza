<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('input_weight');
            $table->integer('output_weight');
            $table->enum('state',['transit','finish']);
            $table->enum('type',['sale','purchase']);
            $table->integer('driver_rif')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('beneficiary_rif')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('product_id')->unsigned();
            // $table->dateTime('date_input');
            // $table->dateTime('date_output');
            $table->foreign('driver_rif')->references('rif')->on('drivers');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('beneficiary_rif')->references('rif')->on('beneficiarys');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
