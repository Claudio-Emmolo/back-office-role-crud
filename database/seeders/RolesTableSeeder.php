<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleList = [
            'admin',
            'editor',
            'user'
        ];

        foreach ($roleList as $role) {
            $newRole = new Role();
            $newRole->name = $role;
            $newRole->save();
        }
    }
}
