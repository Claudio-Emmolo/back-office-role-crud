<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();

        $rolesIds = Role::all()->pluck('id');

        foreach ($users as $user) {
            // Admin
            if ($user->id == 3) {
                // $user->roles()->attach($faker->randomElements($rolesIds, 1));
                $user->roles()->attach(1);
            }

            // Editor
            elseif ($user->id == 4) {
                // $user->roles()->attach($faker->randomElements($rolesIds, 1));
                $user->roles()->attach(2);
            }

            //User
            else {
                $user->roles()->attach(3);
            }
        };
    }
}
