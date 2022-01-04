<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker;
class BoardColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i < 8; $i++) {
            DB::table('boardcolumns')->insert([
                'id' => $i,
                'project_fk' => $i%2 == 0 ? 1 : 2,
                'author_fk' => $i%2 == 0 ? 1 : 2,
                'name' => $faker->text(20),
                'created' => new DateTime(),
                'active' => true,
                'boardIndex' => $i,
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
