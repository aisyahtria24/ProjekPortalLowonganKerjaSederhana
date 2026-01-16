<?php

namespace App\Http\Controllers;

use App\Models\LowonganFiles;
use App\Http\Requests\StoreLowonganFilesRequest;
use App\Http\Requests\UpdateLowonganFilesRequest;

class LowonganFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLowonganFilesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLowonganFilesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LowonganFiles  $lowonganFiles
     * @return \Illuminate\Http\Response
     */
    public function show(LowonganFiles $lowonganFiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LowonganFiles  $lowonganFiles
     * @return \Illuminate\Http\Response
     */
    public function edit(LowonganFiles $lowonganFiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLowonganFilesRequest  $request
     * @param  \App\Models\LowonganFiles  $lowonganFiles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLowonganFilesRequest $request, LowonganFiles $lowonganFiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LowonganFiles  $lowonganFiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(LowonganFiles $lowonganFiles)
    {
        //
    }
}
