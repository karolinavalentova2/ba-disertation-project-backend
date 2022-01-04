<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker;

class ProjectSeeder extends Seeder
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
            DB::table('projects')->insert([
                'id' => $i,
                'team_fk' => $i%2 == 0 ? 1 : 2,
                'author_fk' => $i%2 == 0 ? 1 : 2,
                'name' => $faker->firstName(),
                'created' => new DateTime(),
                'active' => true,
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
        Schema::dropIfExists('projects');
    }
}
