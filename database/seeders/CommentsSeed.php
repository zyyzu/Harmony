<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('comments')->truncate();
        $records = [];
        for($i=0; $i<300; $i++){
            $records[] = [
                'author'=>$faker->numberBetween(1, 101),
                'post'=>$faker->numberBetween(1, 241),
                'content'=>$faker->sentence( ),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ];
        }
        DB::table('comments')->insert($records);
    }
}
