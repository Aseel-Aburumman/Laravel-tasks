<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorsTable extends Migration
{
    public function up()
    {
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('scenario_id')->unique(); // Add unique constraint
            $table->timestamps();

            $table->foreign('scenario_id')->references('id')->on('scenarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('actors');
    }
}
