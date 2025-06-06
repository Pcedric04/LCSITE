<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Projets_Regions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projets_id');
            $table->unsignedBigInteger('regions_id');
            $table->foreign('projets_id')->references('id')->on('projets')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('regions_id')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Projets_Regions');
    }
};
