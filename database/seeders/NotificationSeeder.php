<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 11; $i++) {
            DB::table('notifications')->insert([
                'id' => $i,
                'author_fk' => $i%2 == 0 ? 1 : 2,
                'type_fk' => $i%2 == 0 ? 1 : 2,
                'task_fk' => $i%4 == 0 ? 1 : 2,
                'created' => new DateTime(),
                'isRead' =>  $i%2 == 0,
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
        Schema::dropIfExists('notifications');
    }
}
