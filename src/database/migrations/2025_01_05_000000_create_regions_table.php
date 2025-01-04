<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name_uz');
            $table->string('name_oz');
            $table->string('name_ru');
        });
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}