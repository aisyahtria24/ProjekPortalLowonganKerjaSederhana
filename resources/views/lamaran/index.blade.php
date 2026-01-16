@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lamaran Kerja</h1>
        </div>

        <div class="card bg-white shadow mb-4">
            <div class="card-header bg-white">
                <form method="get">
                    <div class="d-flex flex-column flex-sm-row justify-content-between">
                        <div class=" mb-sm-3  d-flex flex-column flex-sm-row ">
                            <div class="me-sm-3 mb-3 mb-sm-0">
                                <div class="input-group input-group-sm ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text inpu" id="inputGroup-sizing-sm">Tampilkan</span>
                                    </div>
                                    <select class="form-control filter" name="limit">
                                        @foreach ([10, 25, 50, 100] as $item)
                                            <option value="{{ $item }}"
                                                <?= $filter['limit'] == $item ? 'selected' : '' ?>>
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
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            @if (auth()->user()->role == 'admin')
                                <th scope="col">Pelamar</th>
                            @endif
                            <th scope="col">Tanggal Lamaran</th>
                            <th scope="col">Lowongan Kerja</th>
                            <th scope="col">Lampiran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lamarans as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}.</th>
                                @if (auth()->user()->role == 'admin')
                                    <td>{{ $item->user->name }}</td>
                                @endif
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->lowongan->judul }}</td>
                                <td>
                                    <ol>
                                        @foreach ($item->files as $file)
                                            <li><a href="{{ asset($file->path) }}">{{ $file->nama_file }}</a></li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @can('approve', $item)
                                        <a href="{{ route('lamaran.approve', $item) }}"
                                            class="btn btn-sm btn-warning shadow-sm">
                                            <i class="fas fa-check fa-sm mr-2"></i>Terima
                                        </a>
                                        <a href="{{ route('lamaran.reject', $item) }}" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-times fa-sm mr-2"></i>Tolak
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="6">Tidak ada data</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white"></div>
        </div>


    </div>
@endsection
