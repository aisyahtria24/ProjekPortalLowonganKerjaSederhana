<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LowonganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::where('role', 'admin')->pluck('id')->toArray();
        return [
            'user_id'    => $users[array_rand($users)],
            'judul'      => $this->faker->jobTitle(),
            'deskripsi'  => $this->faker->paragraph(2),
            'perusahaan' => $this->faker->company(),
            'lokasi'     => $this->faker->city(),
            'gaji'       => $this->faker->numberBetween(4000000, 15000000),
            'tgl_buka'   => now()->toDateString(),
            'tgl_tutup'  => now()->addDays(30)->toDateString(),
        ];
    }
}
