<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $notificationType = ['Completed', 'Assigned to', 'Commented', 'Deleted'];

        for($i = 1; $i < 5; $i++) {
            DB::table('notificationtype')->insert([
                'id' => $i,
                'name' => $notificationType[$i-1],
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
        Schema::dropIfExists('notificationtype');
    }
}
