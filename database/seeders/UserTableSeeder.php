<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userList = [
            [
                'name' => 'Gino',
                'email' => 'gino@gmail.com',
                'password' => '12345678',
                'role' => 3
            ],
            [
                'name' => 'Pino',
                'email' => 'pino@gmail.com',
                'password' => '12345678',
                'role' => 3
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '12345678',
                'role' => 1
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => '12345678',
                'role' => 2
            ]
        ];


        foreach ($userList as $user) {
            $newUser = new User();
            $newUser->role_id = $user['role'];
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->save();
        }
    }
}
