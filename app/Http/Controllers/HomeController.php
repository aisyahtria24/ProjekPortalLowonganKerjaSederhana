<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  //menampilkan halaman home
  public function index()
  {
    //judul halaman home
    $data['title'] = 'Welcome to Home Page';
    //ngambil maks 6 data lowongan
    $data['lowongans'] = Lowongan::where('tgl_buka', '<=', date('Y-m-d'))->limit(6)->get();
    //mengirim data ke view
    return view('home', $data);
  }
}
