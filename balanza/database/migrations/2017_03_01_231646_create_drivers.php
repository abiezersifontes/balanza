<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->integer('rif',20)->unique()->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::unprepared("ALTER TABLE  `drivers` CHANGE  `rif`  `rif` INT( 8 ) UNSIGNED ZEROFILL NOT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('drivers');
    }
}
