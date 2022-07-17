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
        Schema::table("informations", function (Blueprint $table) {
            $table->foreignId("user_id")->constrained();
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId("user_id")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("informations", function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn("user_id");
        });
        Schema::table("categories", function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn("user_id");
        });
    }
};
