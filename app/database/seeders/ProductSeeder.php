<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'images' => json_encode([$faker->imageUrl(), $faker->imageUrl(), $faker->imageUrl()]),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 10), // Assuming 10 categories exist
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
