<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('users')->truncate();
        $exampleUser = [
            'id' => 1,
            'first_name' => 'Marian',
            'second_name' => null,
            'last_name' => 'Paździoch',
            'email'=> 'pazdzioch.m@marianowo.pl',
            'email_verified_at'=> null,
            'password'=> '$2y$10$CClN6mgc4s34fLXXxgBSSOoRy6Nvyp56TnqXnwIZfN29/11I1BAVC',
            'remember_token'=>null,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ];
        DB::table('users')->insert($exampleUser);
        for ($j = 0; $j < 1; $j++) {
            $users = [];
            for ($i = 0; $i < 100; $i++) {
                $users[] = [
                    'first_name' => $faker->firstName,
                    'second_name' => null,
                    'last_name' => $faker->lastName,
                    'email'=> $faker->email,
                    'email_verified_at'=> null,
                    'password'=> Hash::make($faker->randomElement(['Atari123123', 'EA123123123', 'Blizzard123123123', 'Ubisoft123123123', 'Sega123123123', 'Sony123123123', 'Nintendo123123123'])),
                    'remember_token'=>null,
                    'created_at'=>Carbon::now(),
                    'updated_at'=>Carbon::now(),
                ];
            }
            DB::table('users')->insert($users);
        }
    }
}
