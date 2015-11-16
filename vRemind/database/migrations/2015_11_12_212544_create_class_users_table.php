<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_id');
            $table->integer('user_id');
            $table->boolean('is_owner');
            $table->boolean('participant_can_reply');
            $table->boolean('message_under_13');
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
        Schema::drop('class_users');
        //
    }
}
