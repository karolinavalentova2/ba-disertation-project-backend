<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call([
            UserSeeder::class,
            TeamSeeder::class,
            ProjectSeeder::class,
            BoardColumnSeeder::class,
            ProjectTaskSeeder::class,
            CommentSeeder::class,
            ProjectTask_ContributorSeeder::class,
            NotificationTypeSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
