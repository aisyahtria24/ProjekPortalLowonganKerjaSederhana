<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $data['title'] = 'Welcome to Home Page';
    $data['lowongans'] = Lowongan::where('tgl_buka', '<=', date('Y-m-d'))->limit(6)->get();
    return view('home', $data);
  }
}
