<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("studid");
            $table->string('title');
            $table->string('category');
            $table->date("start_date");
            $table->date("end_date");
            $table->foreignId("svid");
            $table->foreignId("exid1");
            $table->foreignId("exid2");
            $table->integer("duration");
            $table->string("progress");
            $table->string("status");
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
        Schema::dropIfExists('projects');
    }
}
