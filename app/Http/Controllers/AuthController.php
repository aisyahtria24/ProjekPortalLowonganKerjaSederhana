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

  public function register()
  {
    $data['title'] = 'Halaman Register';
    return view('auth.register', $data);
  }

  public function store(RegisterRequest $request)
  {
    $validated             = $request->validated();
    $validated['password'] = bcrypt($validated['password']);

    $validated['cv']->store('public/cv/');
    $validated['cv'] = $validated['cv']->hashName();

    $validated['photo']->store('public/photo/');
    $validated['photo'] = $validated['photo']->hashName();

    User::create($validated);
    return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
  }
}
