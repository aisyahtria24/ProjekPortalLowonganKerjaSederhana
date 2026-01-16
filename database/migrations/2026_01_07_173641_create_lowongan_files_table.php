<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowonganFilesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lowongan_files', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('lamaran_id');

      $table->string('nama_file');
      $table->string('tipe_file')->nullable();

      $table->timestamps();

      $table->foreign('lamaran_id')
        ->references('id')
        ->on('lamarans')
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
    Schema::dropIfExists('lowongan_files');
  }
}
