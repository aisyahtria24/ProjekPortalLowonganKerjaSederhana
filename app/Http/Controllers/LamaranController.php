<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Http\Requests\StoreLamaranRequest;
use App\Models\Lowongan;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $this->authorize('viewAny', Lamaran::class);
    $validated = $request->validate(['limit' => 'nullable|integer|min:10|max:100', 'search' => 'nullable|string|max:255']);

    $filter = [
      'limit' => $validated['limit'] ?? 10,
      'search' => $validated['search'] ?? '',
    ];
    $data['lamarans'] = Lamaran::when(auth()->user()->role != 'admin', function ($query) {
      $query->where('user_id', auth()->id());
    })->when($filter['search'], function ($query) use ($filter) {
      $search = strtolower($filter['search']);
      $query->whereHas('lowongan', function ($query2) use ($search) {
        $query2->whereRaw("lower(judul) LIKE ? ", ["%{$search}%"])
          ->orWhereRaw("lower(perusahaan) LIKE ? ", ["%{$search}%"])
          ->orWhereRaw("lower(lokasi) LIKE ? ", ["%{$search}%"]);
      });
    })->with(['lowongan:id,judul', 'files', 'user:id,name'])->paginate($filter['limit'])->appends($filter);

    $data['title'] = 'Lamaran Kerja';
    $data['filter'] = $filter;
    return view('lamaran.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Lowongan $lowongan)
  {
    $this->authorize('create', [Lamaran::class, $lowongan]);
    $data['title'] = 'Upload Berkas';
    $data['lowongan'] = $lowongan;
    return view('lamaran.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreLamaranRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreLamaranRequest $request, Lowongan $lowongan)
  {
    $this->authorize('create', [Lamaran::class, $lowongan]);
    $validated = $request->validated();
    $user = $request->user();
    $files = [];
    foreach ($validated['files'] as $file) {
      $file->store('public/lamaran/' . $user->id . '/');
      $files[] = ['nama_file' => $file->getClientOriginalName(), 'path' => 'storage/lamaran/' . $user->id . '/' . $file->hashName(), 'tipe_file' => $file->extension()];
    }
    $lamaran = Lamaran::create(['lowongan_id' => $lowongan->id, 'user_id' => $user->id, 'status' => 'Dikirim']);
    $lamaran->files()->createMany($files);
    return redirect()->route('lamaran.index')->with('success', 'Lamaran Kerja berhasil Dikirim.');
  }

  public function approve(Lamaran $lamaran)
  {
    $this->authorize('approve', $lamaran);

    $lamaran->status = "Diterima";
    $lamaran->save();
    return redirect()->route('lamaran.index')->with('success', 'Lamaran Kerja berhasil Diterima.');
  }

  public function reject(Lamaran $lamaran)
  {
    $this->authorize('approve', $lamaran);

    $lamaran->status = "Ditolak";
    $lamaran->save();
    return redirect()->route('lamaran.index')->with('success', 'Lamaran Kerja berhasil Ditolak.');
  }
}
