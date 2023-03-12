<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('gallery_type_id')->nullable();
            $table->timestamps();
        });

        Schema::table('userprofiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('userprofiles', function (Blueprint $table) {
            $table->foreign('gallery_type_id')->references('id')->on('gallery_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userprofiles');
    }
}
