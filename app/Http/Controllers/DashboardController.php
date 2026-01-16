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
    $data['title'] = 'Dashboard';
    $user = Auth::user();
    $data['lowongans_count'] = Lowongan::when($user->role != "admin", function ($query) {
      $query->where('tgl_buka', '>=', date('Y-m-d'));
    })->count();
    $data['lamarans'] = Lamaran::select('id', 'status')->get();
    $data['lamarans_count'] = $data['lamarans']->count();
    $data['diterima'] = $data['lamarans_count'] > 0 ? ceil(($data['lamarans']->where('status', 'Diterima')->count() / $data['lamarans_count']) * 100) : 0;
    return view('dashboard', $data);
  }
}
