@extends('layouts.guest')
@section('title', $title)
@section('content')
    <section>
        <div class="justify-content-center col-sm-6 col-lg-4 mx-auto">

            <div class="card  border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><i class="bi bi-lock-fill me-2 "></i>Login</h1>
                        </div>
                        <form method="POST" action="{{ route('login.authenticate') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="InputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="InputEmail"
                                    placeholder="Enter Email Address..." autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="InputPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="InputPassword"
                                    placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user w-100">
                                Login
                            </button>
                        </form>
                        <hr>
                        <a href="{{ route('register') }}" class="btn btn-success btn-user w-100">
                            Register
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
