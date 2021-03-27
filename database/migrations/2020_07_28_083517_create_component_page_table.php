<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('component_id')->index();
            $table->unsignedBigInteger('page_id')->index();
            $table->integer('index')->default(0);
            $table->integer('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_page');
    }
}
