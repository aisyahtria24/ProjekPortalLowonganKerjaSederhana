
@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lowongan Kerja</h1>
            @can('create', 'App\Models\Lowongan')
                <a href="{{ route('lowongan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm  mr-2"></i> Tambah Lowongan
                </a>
            @endcan
        </div>

        <!-- Content Row -->
        <form method="get">
            <div class="d-flex flex-column flex-sm-row justify-content-between">
                <div class=" mb-sm-3  d-flex flex-column flex-sm-row ">
                    <div class="me-sm-3 mb-3 mb-sm-0">
                        <div class="input-group input-group-sm ">
                            <div class="input-group-prepend">
                                <span class="input-group-text inpu" id="inputGroup-sizing-sm">Tampilkan</span>
                            </div>
                            <select class="form-control filter" name="limit">
                                @foreach ([6, 9, 18, 36, 72] as $item)
                                    <option value="{{ $item }}" <?= $filter['limit'] == $item ? 'selected' : '' ?>>
                                        {{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-2  my-sm-2 ">
                    <div class="input-group input-group-sm ">
                        <input type="text" class="form-control form-control-sm" name="search" id="search"
                            placeholder="Cari..." value="<?= $filter['search'] ?>">
                        <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            @forelse ($lowongans as $item)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 ">
                        <div class="card-body ">
                            <a class="text-decoration-none" href="{{ route('lowongan.show', $item) }}">
                                <div class="col mr-2">
                                    <div class="h6 font-weight-bold text-primary text-uppercase mb-1 desc-limit">
                                        {{ $item->judul }}</div>
                                    <p class="desc-limit text-muted small text-justify">{{ $item->deskripsi }}</p>
                                    <div class="row mt-3">
                                        <div class="h6 mb-0 font-weight-bold text-gray-800 col-sm"><i
                                                class="fas fa-building mr-2 text-primary"></i>{{ $item->perusahaan }}
                                        </div>
                                        <div class="h6 mb-0 font-weight-bold text-gray-800 col-sm"><i
                                                class="fas fa-map-pin mr-2 text-danger"></i>{{ $item->lokasi }}</div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body text-center">
                            Tidak ada data lowongan tersedia.
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-left mt-2 mt-sm-0"> Menampilkan
                {{ $lowongans->count() }} dari {{ $lowongans->total() }}
            </div>
            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                {{ $lowongans->onEachSide(1)->links() }}
            </div>

        </div>
    @endsection
