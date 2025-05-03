<?php

use Illuminate\Database\Eloquent\SoftDeletes;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('photoIllustration');
            $table->string('titre');
            $table->longText('sousTitre')->nullable();
            $table->longText('contenus');
            $table->string('status')->default('Hors ligne');
            $table->unsignedInteger('visits')->default(0);
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('souscategories_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('souscategories_id')->references('id')->on('souscategories')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
};
