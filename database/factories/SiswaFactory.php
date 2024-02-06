<?php

namespace Database\Factories;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_kelas' => $this->faker->nama_kelas(),
            'id_kelas' => Kelas::inRandomOrder()->first()->_id,
        ];
    }
}