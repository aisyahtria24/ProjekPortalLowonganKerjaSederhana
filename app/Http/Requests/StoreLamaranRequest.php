<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLamaranRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return $this->user()->can('create', ['App/Models/Lamaran', $this->lowongan]);;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'files' => 'required|array',
      'files.*' => 'required|file|mimes:pdf,jpg,png,jpeg'
    ];
  }
}
