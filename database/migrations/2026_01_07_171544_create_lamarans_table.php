<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaransTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lamarans', function (Blueprint $table) {
      $table->id();

      $table->unsignedBigInteger('lowongan_id');
      $table->unsignedBigInteger('user_id');

      $table->text('pesan')->nullable();
      $table->string('status')->default('baru');

      $table->timestamps();

      $table->foreign('lowongan_id')
        ->references('id')->on('lowongans')
        ->onDelete('cascade');

      $table->foreign('user_id')
        ->references('id')->on('users')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('lamarans');
  }
}
