<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('otp')->nullable();
            $table->date('dob')->nullable();
            $table->string('profile_img')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('male');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->text('biography')->nullable();
            $table->text('category')->nullable();
            $table->double('rating', 8, 2)->default('0.0');
            $table->integer('ratings_count')->default('0');
            $table->integer('total_quiz')->default('0');
            $table->enum('role', ['student', 'instructor'])->default('student');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('reset_password')->nullable();
            $table->enum('status', ['inactive', 'pending', 'active', 'block'])->default('inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
