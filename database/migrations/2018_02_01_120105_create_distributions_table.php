<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taxon_id');
            $table->string('specie_id');
            $table->string('method_id');
            $table->string('observation_id');
            $table->string('gazetteer_id');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('number');
            $table->string('recordid');
            $table->string('age_id');
            $table->string('abundance_id');
            $table->string('specimencode');
            $table->string('collectorinstitution');
            $table->string('Sex');
            $table->string('remark');
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
        Schema::dropIfExists('distributions');
    }
}
