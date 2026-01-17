<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    //judul halaman dashboard
    $data['title'] = 'Dashboard';
    //mengambil data user yang sedang login
    $user = Auth::user();
    $data['lowongans_count'] = Lowongan::when($user->role != "admin", function ($query) {
      $query->where('tgl_buka', '>=', date('Y-m-d'));
    })->count();
    //mengambil data lamaran. yang diambil hanya id dan status
    $data['lamarans'] = Lamaran::select('id', 'status')->get();
    //menghitung total lamaran 
    $data['lamarans_count'] = $data['lamarans']->count();
    $data['diterima'] = $data['lamarans_count'] > 0 ? ceil(($data['lamarans']->where('status', 'Diterima')->count() / $data['lamarans_count']) * 100) : 0;
    //mengirim data ke view dashboard
    return view('dashboard', $data);
  }
}
