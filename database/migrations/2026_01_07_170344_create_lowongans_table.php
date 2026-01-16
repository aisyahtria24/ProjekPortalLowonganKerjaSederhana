<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowongansTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('lowongans', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');

      $table->string('judul');
      $table->text('deskripsi');
      $table->string('perusahaan');
      $table->string('lokasi');
      $table->integer('gaji')->nullable();
      $table->date('tgl_buka');
      $table->date('tgl_tutup')->nullable();

      $table->timestamps();

      $table->foreign('user_id')
        ->references('id')
        ->on('users')
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
    Schema::dropIfExists('lowongans');
  }
}
