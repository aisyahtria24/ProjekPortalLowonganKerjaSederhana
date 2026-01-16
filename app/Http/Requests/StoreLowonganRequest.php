<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLowonganRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return $this->user()->can('create', 'App/Models/Lowongan');;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'judul' => 'required|string|unique:lowongans|min:10|max:255',
      'deskripsi' => 'required|string|min:20|max:1000',
      'perusahaan' => 'required|string|min:5|max:255',
      'lokasi' => 'required|string|min:5|max:255',
      'gaji' => 'nullable|integer',
      'tgl_buka' => 'required|date',
      'tgl_tutup' => 'nullable|date|after:tgl_buka'
    ];
  }
}
