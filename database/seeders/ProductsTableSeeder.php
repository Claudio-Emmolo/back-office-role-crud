<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newProduct = new Product();
            $newProduct->user_id = User::inRandomOrder()->first()->id;
            $newProduct->title = $faker->sentence();
            $newProduct->description = $faker->text(200);
            $newProduct->price = $faker->randomFloat(1, 20, 30);
            $newProduct->save();
        }
    }
}
