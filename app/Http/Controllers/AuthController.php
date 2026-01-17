<?php

namespace App\Http\Controllers;

//import request khusus untuk validasi login
use App\Http\Requests\LoginRequest;
//import request khusus untuk validasi register
use App\Http\Requests\RegisterRequest;
//import model user
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //menampilkan halaman login
  public function login()
  {
    //data judul halaman
    $data['title'] = 'Halaman Login';
    //mengembalikan view login
    return view('auth.login', $data);
  }

  public function authenticate(LoginRequest $request)
  {
    //proses autentikasi
    $validated = $request->validated();
    if (Auth::attempt($validated)) {
      $request->session()->regenerate();
      return redirect()->intended('/dashboard');
    } else {
      return back()->withErrors(['loginError' => 'Email atau password salah']);
    }
  }

  //menampilkan halaman register
  public function register()
  {
    //data judul halaman
    $data['title'] = 'Halaman Register';
    //mengembalikan view register
    return view('auth.register', $data);
  }

  //proses penimoanan data registrasi user 
  public function store(RegisterRequest $request)
  {
    //validasi data register
    $validated             = $request->validated();
    //enkripsi password sebelum disinpan ke database
    $validated['password'] = bcrypt($validated['password']);

    //simpan file cv ke folder storage/public/cv
    $validated['cv']->store('public/cv/');
    //ambil nama file hash untuk disimpan di database
    $validated['cv'] = $validated['cv']->hashName();

    //simpan file foto ke folder storage/public/photo
    $validated['photo']->store('public/photo/');
    //ambil nama file hash untuk disimpan di database
    $validated['photo'] = $validated['photo']->hashName();

    //simpan data user ke database
    User::create($validated);
    //redirect ke halaman login dengan pesan sukses
    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
  }
  //ini proses logout user
  public function logout(Request $request)
  {
    //ini logout user
    Auth::logout();
    //invalidasi session
    $request->session()->invalidate();
    //regenerate CSRF token
    $request->session()->regenerateToken();
    //redirect ke halaman home
    return redirect()->route('home');
  }
}
