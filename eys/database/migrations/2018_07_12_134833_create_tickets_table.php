<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tickets', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->references('id')->on('users')->default(1);
      $table->integer('parent_id')->nullable()->references('id')->on('tickets');
      $table->integer('team_id')->references('id')->on('teams');
      $table->string('subject', 100);
      $table->text('description');
      $table->enum('visibility', ['published', 'internal'])->default('published');
      $table->string('startup_cmd', 100)->nullable();
      $table->string('login_cmd', 100)->nullable();
      $table->text('extra_info')->nullable();
      $table->string('stop_cmd', 100)->nullable();
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
    Schema::dropIfExists('tickets');
  }
}
