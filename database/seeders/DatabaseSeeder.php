<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


        foreach (range(1, 150) as $index) {
            DB::table('songs')->insert([
                'title' => $faker->title,
                'artist' => $faker->name,
                'lyrics' => $faker->paragraph(3),
                'created_at' => $faker->date('Y-m-d H:i:s')
            ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}