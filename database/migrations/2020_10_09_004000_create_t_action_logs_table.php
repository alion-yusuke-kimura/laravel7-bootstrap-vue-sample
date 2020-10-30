<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTActionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_action_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('route')->nullable();
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->text('data')->nullable();
            $table->string('remote_addr')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->index(['created_at']);
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_action_logs');
    }
}
