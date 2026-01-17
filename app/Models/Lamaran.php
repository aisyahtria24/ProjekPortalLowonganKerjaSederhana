<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Lamaran extends Model
{
  use HasFactory;

  protected $fillable = [
    'lowongan_id',
    'user_id',
    'pesan',
    'status',
  ];

  function files(): Relation
  {
    return $this->hasMany(LowonganFiles::class, 'lamaran_id');
  }

  function lowongan(): Relation
  {
    return $this->belongsTo(Lowongan::class, 'lowongan_id');
  }
  function user(): Relation
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
