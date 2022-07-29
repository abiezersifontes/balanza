<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiarys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarys', function (Blueprint $table) {
            $table->integer('rif',20)->unique()->unsigned();
            $table->string('type_id',3);
            $table->string('name');
            $table->string('phone');
            $table->timestamps();
            $table->softDeletes();            
        });        
        DB::unprepared("ALTER TABLE  `beneficiarys` CHANGE  `rif`  `rif` INT( 9 ) UNSIGNED ZEROFILL NOT NULL;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiarys');
    }
}
