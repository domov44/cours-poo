<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = DB::table('users')->pluck('id')->toArray();
        $categorieIds = DB::table('categories')->pluck('id')->toArray();

        $userId = $faker->randomElement($userIds);
        $categorieId = $faker->randomElement($categorieIds);
        DB::table('articles')->insert([
            'title' => $faker->sentence,
            'content' => $faker->paragraph(5),
            'user_id' => $userId,
            'categorie_id' => $categorieId,
        ]);
    }
}
