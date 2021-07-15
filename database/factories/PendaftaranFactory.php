<?php

namespace Database\Factories;

use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pasien;
use Carbon\Carbon;

class PendaftaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pendaftaran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $pendaftaran_terakhir = isset(Pendaftaran::all()->last()->id)+1;
        $format_pendaftaran = Carbon::now()->format('Ymd');
        return
        [
            'pasien_id' => $this->faker->randomDigit(1, 10),
            'tanggal_daftar' => $this->faker->dateTime()->format('Ymd'),
            'keluhan_pasien'=> $this->faker->randomElement($array = array('Demam', 'Batuk', 'Alergi', 'Flu')),
            'no_pasien' => "$format_pendaftaran$pendaftaran_terakhir",
            'status' => $this->faker->randomElement($array = array('Dalam Antrian'))
        ];
    }
}
