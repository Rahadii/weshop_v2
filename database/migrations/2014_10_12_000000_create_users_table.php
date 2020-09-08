<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('photos', 50)->default('static/dist/img/avatar5.png');
            $table->string('username');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('address');
            $table->string('phone');
            $table->enum('gender',['L','P']);
            $table->enum('status',['0','1'])->default('0');
            $table->date('birthday');
            $table->enum('role',['admin','supplier','member']);
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
