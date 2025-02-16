<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::insert([
            [
                'name' => 'admin',
                'email' => 'margulan@0x0.kz',
                'password' => '$2y$12$LuB3vDLHvthd/eRoRick8OJxKY3THkb.LuNb77bpm50nV12VoTbDq',
                'role' => 'admin',
                'depart' => 'admin',
                'var1' => 'admin',
                'var2' => 'admin',
                'var3' => 'admin',
            ],
            [
                'name' => 'pincode',
                'email' => '',
                'password' => '$2y$12$9T9RjU2T95KmeWPemWFsIejj55AwjyBR.iR4NMHdXDIiVj1gk1j72',
                'role' => 'user',
                'depart' => '',
                'var1' => '',
                'var2' => '',
                'var3' => '',
            ]
        ]);
    }
}
