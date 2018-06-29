<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taxon');
            $table->string('order');
            $table->string('family');
            $table->string('genus');
            $table->string('species');
            $table->string('species_author');
            $table->string('subspecies');
            $table->string('subspecies_author');
            $table->string('common_name');
            $table->string('iucn_threat_code');
            $table->string('range');
            $table->string('growth_form');
            $table->string('foresuse');
            $table->string('wateruse');
            $table->string('endemism');
            $table->string('migration');
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
          Schema::dropIfExists('species');
    }
}
