<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


  public function login()
  {
    $data['title'] = 'Halaman Login';
    return view('auth.login', $data);
  }

  public function authenticate(LoginRequest $request)
  {
    $validated = $request->validated();
    if (Auth::attempt($validated)) {
      return redirect()->route('dashboard');
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
    $validated = $request->validated();
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
