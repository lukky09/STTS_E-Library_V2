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
            $table->id('user_id')->autoIncrement();
            $table->string('user_fname');
            $table->string('user_lname');
            $table->string('user_email')->unique();
            $table->string('user_pass');
            $table->integer('user_saldo')->default(0);
            $table->smallInteger('user_isadmin')->comment('0 = admin, 1 = user biasa')->default(0);
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
        Schema::dropIfExists('users');
    }
}
