<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portal Lowongan Kerja - @yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet" />
</head>

<body class="bg-light">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-lg-5">
            <a class="navbar-brand" href="{{ route('home') }}">Portal Lowongan Kerja</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"
                            href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @if ($errors->any())
        <div class="alert alert-danger fade show py-2" role="alert">
            @foreach ($errors->all() as $error)
                <div class="text-center">{{ $error }}</div>
            @endforeach
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success fade show py-2" role="alert">
            <div class="text-center">{{ session('success') }}</div>
        </div>
    @endif
    <main class="my-3">

        @yield('content')
    </main>
    <script src="{{ asset('js/guest.js') }}"></script>
</body>

</html>
