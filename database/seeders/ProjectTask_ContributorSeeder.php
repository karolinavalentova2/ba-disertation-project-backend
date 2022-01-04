<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProjectTask_ContributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1; $i < 6; $i++) {
            DB::table('projecttasks_contributors')->insert([
                'id' => $i,
                'userId' => $i%2 == 0 ? 1 : 2,
                'projectTaskId' => $i%2 == 0 ? 1 : 2,
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
        Schema::dropIfExists('projecttasks_contributors');
    }
}
