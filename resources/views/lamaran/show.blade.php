@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Lowongan Kerja</h1>
            <div>
                @can('update', $lowongan)
                    <a href="{{ route('lowongan.edit', $lowongan) }}" class="btn btn-sm btn-warning shadow-sm">
                        <i class="fas fa-edit fa-sm mr-2"></i> Ubah Lowongan
                    </a>
                @endcan
                @can('delete', $lowongan)
                    <button type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-sm btn-danger shadow-sm">
                        <i class="fas fa-trash fa-sm mr-2"></i> Hapus Lowongan
                    </button>
                @endcan
                @can('create', ['App\Models\Lamaran', $lowongan])
                    <a href="{{ route('lowongan.lamaran.create', $lowongan) }}" class="btn btn-sm btn-warning shadow-sm">
                        <i class="fas fa-edit fa-sm mr-2"></i> Masukan Lamaran
                    </a>
                @endcan
            </div>
        </div>
        <div class="card shadow mb-3">
            <div class="card-header">
                <h5 class="mb-0">Informasi Lowongan</h5>
            </div>

            <div class="card-body">

                <!-- DATA LOWONGAN -->

                <table class="table table-borderless mb-3">
                    <tr>
                        <td width="25%">Judul</td>
                        <td>{{ $lowongan->judul }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>{{ $lowongan->deskripsi }}</td>
                    </tr>
                    <tr>
                        <td>Perusahaan</td>
                        <td>{{ $lowongan->perusahaan }}</td>
                    </tr>

                    <tr>
                        <td>Lokasi</td>
                        <td>{{ $lowongan->lokasi }}</td>
                    </tr>

                    <tr>
                        <td>Gaji</td>
                        <td>
                            @if ($lowongan->gaji)
                                Rp {{ number_format($lowongan->gaji) }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Tanggal Tutup</td>
                        <td>{{ $lowongan->tgl_tutup ?? '-' }}</td>
                    </tr>
                </table>


                <!-- DATA PELAMAR -->




            </div>

        </div>
        <div><a href="{{ route('lowongan.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-chevron-left mr-2"></i>
                Kembali
            </a></div>
    </div>
    <form action="{{ route('lowongan.destroy', $lowongan) }}" method="post">
        @method('delete')
        @csrf
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perhatian!</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="card-body">Apakah anda yakin akan menghapus lowongan kerja ini?</div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Ya, Lanjutkan</button>
                        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Tidak,
                            Batalkan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
