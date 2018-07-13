<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketOwnerships extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ownerships', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->references('id')->on('users');
      $table->integer('ticket_id')->references('id')->on('roles');
      $table->enum('status', ['open', 'pending', 'closed'])->default('open');
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
    Schema::dropIfExists('ownerships');
  }
}
