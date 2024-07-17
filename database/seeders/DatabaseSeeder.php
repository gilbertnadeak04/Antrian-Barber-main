<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Antrian;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'pasien'
        ]);

        User::create([
            'name'      => 'Admin',
            'nik'       => '1234567890123456',
            'no_telepon' => '62473284',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 1
        ]);

        User::create([
            'name'      => 'Robert Davis Chaniago',
            'nik'       => '1234567890123456',
            'no_telepon' => '62473284',
            'email'     => 'robert@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);

        User::create([
            'name'      => 'Mujiyono',
            'nik'       => '1234567890123456',
            'no_telepon' => '62473284',
            'email'     => 'mujiyono@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);
    }
}
