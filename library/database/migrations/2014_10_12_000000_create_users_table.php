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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userName');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('active')->default(false);
            $table->integer ('role');
            $table->string('mobile');
            $table->text('avatar')->default("uploads/users/avatar/fjP6cGVR4iIr5BfdOrW2lbNWkOvXlDUsC1GA8x4y.jpg");
            $table->dateTime('registrationDate')->useCurrent();
            // $table->rememberToken();
            // $table->timestamps();
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
};
