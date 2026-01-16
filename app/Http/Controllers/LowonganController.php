<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Http\Requests\StoreLowonganRequest;
use App\Http\Requests\UpdateLowonganRequest;
use Illuminate\Http\Request;

class LowonganController extends Controller
{

  function __construct()
  {
    $this->authorizeResource(Lowongan::class, 'lowongan');
  }

  public function index(Request $request)
  {
    $validated = $request->validate(['limit' => 'nullable|integer|min:6|max:72', 'search' => 'nullable|string|max:255']);

    $filter = [
      'limit' => $validated['limit'] ?? 6,
      'search' => $validated['search'] ?? '',
    ];

    $user = $request->user();

    $data['lowongans'] = Lowongan::when($user->role != "admin", function ($query) {
      $query->where('tgl_buka', '>=', date('Y-m-d'));
    })->when($filter['search'], function ($query) use ($filter) {
      $search = strtolower($filter['search']);
      $query->where(function ($query2) use ($search) {
        $query2->whereRaw("lower(judul) LIKE ? ", ["%{$search}%"])
          ->orWhereRaw("lower(perusahaan) LIKE ? ", ["%{$search}%"])
          ->orWhereRaw("lower(lokasi) LIKE ? ", ["%{$search}%"]);
      });
    })->paginate($filter['limit'])->appends($filter);


    $data['filter'] = $filter;
    $data['title'] = 'Lowongan Kerja';
    return view('lowongan.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data['title'] = 'Tambah Lowongan Kerja';
    return view('lowongan.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreLowonganRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreLowonganRequest $request)
  {
    $validated = $request->validated();
    $validated['user_id'] = $request->user()->id;
    Lowongan::create($validated);
    return redirect()->route('lowongan.index')->with('success', 'Lowongan Kerja berhasil ditambahkan.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Lowongan  $lowongan
   * @return \Illuminate\Http\Response
   */
  public function show(Lowongan $lowongan)
  {
    $data['title'] = 'Detail Lowongan Kerja';
    $data['lowongan'] = $lowongan;
    return view('lowongan.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Lowongan  $lowongan
   * @return \Illuminate\Http\Response
   */
  public function edit(Lowongan $lowongan)
  {
    $data['title'] = 'Ubah Lowongan Kerja';
    $data['lowongan'] = $lowongan;
    return view('lowongan.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateLowonganRequest  $request
   * @param  \App\Models\Lowongan  $lowongan
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateLowonganRequest $request, Lowongan $lowongan)
  {
    $validated = $request->validated();
    $lowongan->update($validated);
    return redirect()->route('lowongan.index')->with('success', 'Lowongan Kerja berhasil diubah.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Lowongan  $lowongan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Lowongan $lowongan)
  {
    $lowongan->delete();
    return redirect()->route('lowongan.index')->with('success', 'Lowongan Kerja berhasil dihapus.');
  }
}
