<?php

namespace Database\Factories;

use App\Models\Lamaran;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Storage;
class LowonganFilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $source   = database_path('seeders/dummy/cv.pdf');
        $filename = Str::uuid() . '.pdf';
        $path     = 'tipe_file/' . $filename;
        Storage::disk('public')->put(
            $path,
            file_get_contents($source)
        );
        return [
            'lamaran_id' => Lamaran::factory(),
            'nama_file' => $path,
            'tipe_file' => 'pdf',


        ];
    }
}
