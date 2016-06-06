<?php

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
            $table->string('email')->unique();
            $table->integer('phone');
            $table->integer('fax');
            $table->integer('post_code');
            $table->string('address');
            $table->string('password', 60);
            $table->string('avatar');
            $table->tinyInteger('role_id');
            $table->integer('key_active');
            $table->string('status');
            $table->string('codeAuth');
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
        Schema::drop('users');
    }
}
