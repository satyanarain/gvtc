<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGazetteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gazetteers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('countrie_id');
            $table->string('place');
            $table->string('details');
            $table->string('eastings');
            $table->string('northings');
            $table->string('zone');
            $table->string('datum');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('habitat');
            $table->string('altitude');
            $table->string('slope');
            $table->string('aspect');
            $table->string('soil');
            $table->string('protected_area_id');
            $table->string('adminunit_id');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('gazetteers');
    }
}
