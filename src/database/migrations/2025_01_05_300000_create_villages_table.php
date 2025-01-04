<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    public function up()
    {
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->string('name_uz');
            $table->string('name_oz');
            $table->string('name_ru');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('villages');
    }
}
