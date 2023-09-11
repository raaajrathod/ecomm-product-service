<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('categories')->insert([
                'name' => $faker->word,
                'description' => $faker->sentence,
                'images' => json_encode([$faker->imageUrl()]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
