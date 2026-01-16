@extends('layouts.guest')
@section('title', $title)
@section('content')
    <section>
        <div class="justify-content-center col-sm-6 col-lg-4 mx-auto">

            <div class="card  border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-4">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 "><i class="bi bi-person me-2"></i>Register</h1>
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="InputName" class="form-label">Nama</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="InputName"
                                    placeholder="Masukan Nama..." value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="InputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" name="email"
                                            id="InputEmail" placeholder="Masukan Email..." value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="inputNoHp" class="form-label">No. HP</label>
                                        <input type="number" class="form-control form-control-sm" name="no_hp"
                                            id="inputNoHp" value="{{ old('no_hp') }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="InputPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-sm" name="password"
                                            id="InputPassword" placeholder="Masukan Password..." value="{{ old('password') }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="InputPasswordConfirmation" class="form-label">Konfirmasi
                                            Password</label>
                                        <input type="password" class="form-control form-control-sm"
                                            name="password_confirmation" id="InputPasswordConfirmation"
                                            placeholder="Konfirmasi Password..." value="{{ old('password_confirmation') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="inputAlamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" class="form-control form-control-sm" id="inputAlamat" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="inputCV" class="form-label">Curriculum Vitae</label>
                                        <input type="file" class="form-control form-control-sm" name="cv"
                                            accept=".pdf" id="inputCV" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label for="inputFoto" class="form-label">Foto</label>
                                        <input accept=".jpg,.png,.jpeg" type="file" class="form-control form-control-sm"
                                            name="photo" id="inputFoto" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user w-100">
                                Register
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
