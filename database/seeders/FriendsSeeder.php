<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('friends')->truncate();
        $records = [];
        for($i=0; $i<100; $i++){
            do{
                $user1_id = $faker->numberBetween(1, 101);
                $user2_id = $faker->numberBetween(1, 101);
            }while($user1_id==$user2_id || $this->arleadyFriends($user1_id, $user2_id, $records));
            $records[] = [
                'user1_id'=>$user1_id,
                'user2_id'=>$user2_id,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ];
        }
        DB::table('friends')->insert($records);
    }
    function arleadyFriends($user1, $user2, $records){
        if(in_array([$user1=>$user2], $records) || in_array([$user2=>$user1], $records)) return true;
        return false;
    }
}
