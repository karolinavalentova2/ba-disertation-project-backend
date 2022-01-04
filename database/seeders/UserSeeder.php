<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Faker;
class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i < 11; $i++) {
            DB::table('users')->insert([
                'id' => $i,
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'password' => Hash::make('password'),
                'verificationCode' => Str::random(10),
                'imagePath' => "./assets/default-profile.png",
                'active' => true,
                'created' => new DateTime(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
