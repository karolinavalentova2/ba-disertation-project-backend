<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker;
class ProjectTaskSeeder extends Seeder
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
            DB::table('projecttasks')->insert([
                'id' => $i,
                'column_fk' => $i%2 == 0 ? 1 : 2,
                'parent_fk' => null,
                'author_fk' => $i%2 == 0 ? 1 : 2,
                'assignee_fk' => $i%2 == 0 ? $i : null,
                'name' => $faker->name(20),
                'created' => new DateTime(),
                'dueDate' => $i%3 == 0 ? new DateTime() : null,
                'description' => $faker->sentence(20),
                'active' => true,
                'timeTracked' => $i%2 == 0 ? $i*10 : null,
                'completed' => $i%2 == 0,
                'modified' => new DateTime(),
                'columnIndex' => $i,
            ]);
        }
        for($i = 11; $i < 22; $i++) {
            DB::table('projecttasks')->insert([
                'id' => $i,
                'column_fk' => null,
                'parent_fk' => rand(1, 10),
                'author_fk' => $i%2 == 0 ? 1 : 2,
                'assignee_fk' => $i%2 == 0 ? rand(1, 2) : null,
                'name' => $faker->name(20),
                'created' => new DateTime(),
                'dueDate' => $i%3 == 0 ? new DateTime() : null,
                'description' => $faker->sentence(20),
                'active' => true,
                'timeTracked' => $i%2 == 0 ? $i : null,
                'completed' => $i%2 == 0,
                'modified' => new DateTime(),
                'columnIndex' => $i,
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
