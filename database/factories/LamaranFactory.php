<?php
namespace Database\Factories;

use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LamaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users     = User::pluck('id')->toArray();
        $lowongans = Lowongan::pluck('id')->toArray();
        return [
            'user_id'     => $users[array_rand($users)],
            'lowongan_id' => $lowongans[array_rand($lowongans)],
            'pesan'       => 'Saya tertarik melamar posisi ini dan siap mengikuti proses seleksi.',
            'status'      => collect(['pending', 'diterima', 'ditolak'])->random(),
        ];
    }
}
