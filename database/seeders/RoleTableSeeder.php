<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_dokter = new Role();
        $role_dokter->name = 'Dokter';
        $role_dokter->description = 'Hak Akses Dokter';
        $role_dokter->save();

        $resepsionis = new Role();
        $resepsionis->name = 'Resepsionis';
        $resepsionis->description = 'Hak Akses Resepsionis + Apoteker';
        $resepsionis->save();

        $pasien = new Role();
        $pasien->name = 'Pasien';
        $pasien->description = 'Hak Akses Pasien';
        $pasien->save();

        $admin = new Role();
        $admin->name = 'Admin';
        $admin->description = 'Hak Akses Admin';
        $admin->save();

    }
}
