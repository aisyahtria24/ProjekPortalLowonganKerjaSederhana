@extends('layouts.app')
@section('content')
    <div class="container-fluid ">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
        </div>
        <form action="{{ route('lowongan.lamaran.store', $lowongan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Upload Berkas Lampiran (boleh lebih dari satu)</label>
                        <input type="file" name="files[]" accept=".pdf,.jpg,.jpeg,.png"
                            class="form-control-file form-control-sm" multiple required>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save mr-2"></i> Masukan
                        Lamaran</button>
                    <a href="{{ route('lowongan.index') }}" class="btn btn-sm btn-secondary"><i
                            class="fas fa-times mr-2"></i>
                        Batal</a>
                </div>
            </div>
        </form>
    </div>
@endsection
