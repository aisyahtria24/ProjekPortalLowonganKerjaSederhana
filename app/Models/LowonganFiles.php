<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganFiles extends Model
{
  use HasFactory;
  protected $fillable = [
    'lamaran_id',
    'nama_file',
    'tipe_file',
    'path',

  ];
}
