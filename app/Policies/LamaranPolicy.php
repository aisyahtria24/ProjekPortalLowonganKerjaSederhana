<?php

namespace App\Policies;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LamaranPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can view any models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAny(User $user)
  {
    return $user != null;
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Lamaran  $lamaran
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Lamaran $lamaran)
  {
    return $user->id == $lamaran->user_id || $user->role == 'admin';
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user, Lowongan $lowongan)
  {
    return $user->role == 'pelamar' && $user->lamarans->where('lowongan_id', $lowongan->id)->count() == 0 && (!$lowongan->tgl_tutup || $lowongan->tgl_tutup >= date("Y-m-d"));
  }

  public function approve(User $user, Lamaran $lamaran)
  {
    return $user->role == 'admin' && $lamaran->status == 'Dikirim';
  }
}
