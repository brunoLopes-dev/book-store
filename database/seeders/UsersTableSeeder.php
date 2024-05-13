<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Test',
            'email' => 'teste@teste.com',
            'password' => Hash::make('12345test')
        ]);
    }
}

