@extends('layouts.guest')
@section('title', $title)

@section('content')

<!-- Header -->
<header class="pb-4">
    <div class="container px-lg-5">
        <div class="p-4 p-lg-5 rounded-4 text-center shadow"
             style="background: linear-gradient(135deg, #2563eb, #0ea5e9); color: white;">
            <h1 class="display-5 fw-bold mb-3">Selamat Datang!</h1>
            <p class="fs-5 opacity-75">
                Platform ini hadir untuk membantu Anda menemukan lowongan kerja yang paling sesuai
                dengan keahlian dan minat melalui perusahaan terpercaya dan peluang kerja terverifikasi
                yang diperbarui setiap hari.
            </p>
            <p class="fw-semibold mt-3">✨ 6 Lowongan Kerja Terbaru</p>
        </div>
    </div>
</header>

<!-- Page Content -->
<section class="pb-5 bg-light">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">

            @forelse ($lowongans as $item)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm hover-card">

                        <div class="card-body d-flex flex-column">
                            <a href="{{ route('lowongan.show', $item) }}"
                               class="text-decoration-none text-dark">

                                <!-- Badge -->
                                <span class="badge bg-success mb-2">Baru</span>

                                <!-- Judul -->
                                <h6 class="fw-bold text-primary text-uppercase mb-2 desc-limit">
                                    {{ $item->judul }}
                                </h6>

                                <!-- Deskripsi -->
                                <p class="text-muted small desc-limit">
                                    {{ $item->deskripsi }}
                                </p>

                                <!-- Info -->
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span class="text-secondary small">
                                            <i class="bi bi-building me-1 text-primary"></i>
                                            {{ $item->perusahaan }}
                                        </span>
                                        <span class="text-secondary small">
                                            <i class="bi bi-geo-fill me-1 text-danger"></i>
                                            {{ $item->lokasi }}
                                        </span>
                                    </div>

                                    <!-- Tombol -->
                                    <div class="text-end">
                                        <a href="{{ route('lowongan.show', $item) }}"
                                           class="btn btn-sm btn-primary rounded-pill px-4">
                                            <i class="fas fa-paper-plane me-1"></i> Lamar
                                        </a>
                                    </div>
                                </div>

                            </a>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center shadow-sm">
                        Tidak ada data lowongan tersedia.
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>

<!-- Hover Effect -->
<style>
    .hover-card {
        border-top: 4px solid #2563eb;
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(37, 99, 235, 0.25);
    }
</style>

@endsection
