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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('duree');
            $table->longText('financer');
            $table->longText('objectifs');
            $table->longText('documents')->nullable();
            $table->string('status')->default('Hors ligne');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('souscategories_id');
            $table->unsignedBigInteger('regions_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('souscategories_id')->references('id')->on('souscategories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('regions_id')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projets');
    }
};
