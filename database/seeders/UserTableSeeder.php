<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_dokter = Role::where('name', 'Dokter')->first();
        $role_resepsionis = Role::where('name', 'Resepsionis')->first();
        $role_pasien = Role::where('name', 'Pasien')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $dokter = new User();
        $dokter->name = 'Dr. Yudi';
        $dokter->email = 'yudi@gmail.com';
        $dokter->password = bcrypt('dokter12345');
        $dokter->role_id = $role_dokter->id;
        $dokter->save();

        $resepsionis = new User();
        $resepsionis->name = 'Isma Nur Rizki';
        $resepsionis->email = 'isma@gmail.com';
        $resepsionis->password = bcrypt('resepsionis12345');
        $resepsionis->role_id = $role_resepsionis->id;
        $resepsionis->save();

        $pasien = new User();
        $pasien->name = 'Agus';
        $pasien->email = 'agus@gmail.com';
        $pasien->password = bcrypt('pasien12345');
        $pasien->role_id = $role_pasien->id;
        $pasien->save();

        $admin = new User();
        $admin->name = 'Nana Suryana';
        $admin->email = 'nana@gmail.com';
        $admin->password = bcrypt('admin12345');
        $admin->role_id = $role_admin->id;
        $admin->save();
    }
}
