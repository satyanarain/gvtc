<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectedObserversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('observers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observer_id')->unique();
            $table->string('tittle');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('institution');
            $table->string('address');
            $table->string('work_tel_number');
            $table->string('mobile');
            $table->string('email');
            $table->string('website');
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
        Schema::dropIfExists('observers');
    }
}
