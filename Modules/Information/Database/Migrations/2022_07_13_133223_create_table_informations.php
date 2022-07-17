<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("categories", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->boolean("status");
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('category_id')->constrained();
            $table->boolean("status");
            $table->longText("content");
            $table->string("url_image");
            $table->softDeletes();
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
        Schema::dropIfExists('informations');
        Schema::dropIfExists('categories');
    }
};
