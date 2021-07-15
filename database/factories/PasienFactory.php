<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PasienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'nik' => $this->faker->randomDigit,
            'jenis_kelamin' => $this->faker->randomElement($array = array('Laki-laki', 'Perempuan')),
            'tempat_lahir' => $this->faker->randomElement($array = array('Bandung', 'Cimahi', 'Garut')),
            'tanggal_lahir' => $this->faker->dateTimeThisCentury()->format('Y-m-d'),
            'no_handphone' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
        ];
    }
}
