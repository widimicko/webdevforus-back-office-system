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
        Schema::create('members', function (Blueprint $table) {
            $table->id('memberid');
            $table->unsignedBigInteger('groupid')->nullable();
            $table->string('nama');
            $table->string('alamat');
            $table->string('hp');
            $table->string('email');
            $table->string('profile_pic');
            $table->timestamps();

            $table->foreign('groupid')->references('groupid')->on('groups');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
