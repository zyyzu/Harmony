<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('likes')->truncate();
        $pairs = [];
        $faker = Factory::create();
        $likes = [];
        for($i=0; $i<50; $i++){

            do{
                $liker = $faker->numberBetween(1, 101);
                $post = $faker->numberBetween(1, 100);
            }while($this->arleadyLiked($liker, $post, $pairs));
            $likes[] = [
                'post_id'=>$post,
                'user_id'=>$liker,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ];
            $pairs[$i]=[$post=>$liker];
        }
        DB::table('likes')->insert($likes);
    }
    function arleadyLiked($user, $post, $pairs){
        if(in_array([$post=>$user], $pairs)) return true;
        return false;
    }

}
