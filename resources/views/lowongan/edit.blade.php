@extends('layouts.app')
@section('content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>
        <form action="{{ route('lowongan.update', $lowongan) }}" method="POST">
            @method('put')
            @csrf
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul <i class="small text-danger">*</i></label>
                        <input type="text" class="form-control form-control-sm" id="judul" name="judul"
                            value="{{ old('judul') ?? $lowongan->judul }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi <i class="small text-danger">*</i></label>
                        <textarea class="form-control form-control-sm" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') ?? $lowongan->deskripsi }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="perusahaan">Perusahaan <i class="small text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" id="perusahaan" name="perusahaan"
                                    value="{{ old('perusahaan') ?? $lowongan->perusahaan }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="gaji">Gaji</label>
                                <input type="number" class="form-control form-control-sm" id="gaji" name="gaji"
                                    value="{{ old('gaji') ?? $lowongan->gaji }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tgl_buka">Tanggal Buka <i class="small text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" id="tgl_buka" name="tgl_buka"
                                    value="{{ old('tgl_buka') ?? $lowongan->tgl_buka }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tgl_tutup">Tanggal Tutup</label>
                                <input type="date" min="{{ date('Y-m-d') }}" class="form-control form-control-sm"
                                    id="tgl_tutup" name="tgl_tutup" value="{{ old('tgl_tutup') ?? $lowongan->tgl_tutup }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi <i class="small text-danger">*</i></label>
                        <input type="text" class="form-control form-control-sm" id="lokasi" name="lokasi"
                            value="{{ old('lokasi') ?? $lowongan->lokasi }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-2"></i> Simpan</button>
                    <a href="{{ route('lowongan.show', $lowongan) }}" class="btn btn-sm btn-secondary"><i
                            class="fas fa-times mr-2"></i>
                        Batal</a>
                </div>
            </div>
        </form>
    </div>
@endsection
