<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_from')->unsigned();
            $table->foreign('user_from')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('user_to')->unsigned();
            $table->foreign('user_to')->references('id')->on('users')->onDelete('cascade');
            $table->string('message');
            $table->boolean('is_read')->default(false);
            $table->enum('type',['notification','my_courses','favorite','chat'])->default('notification');
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
        Schema::dropIfExists('notifications');
    }
}
