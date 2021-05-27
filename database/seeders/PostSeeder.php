<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('posts')->truncate();
        for ($j = 0; $j < 80; $j++) {
            $userID = $faker->numberBetween(1, 101);
            $posts = [];
            for ($i = 0; $i < 3; $i++) {
                $posts[] = [
                    'content' => $faker->text(200),
                    'author' => $userID,
                    'visibility' => 2,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now()
                ];
            }
            DB::table('posts')->insert($posts);
        }
    }
}
