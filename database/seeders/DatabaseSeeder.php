<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::factory()->create([
            'name' => 'Администратор',
            'email' => 'margulan@0x0.kz',
            'password' => '$2y$12$LuB3vDLHvthd/eRoRick8OJxKY3THkb.LuNb77bpm50nV12VoTbDq',
            'role' => 'admin'
        ]);
    }
}
