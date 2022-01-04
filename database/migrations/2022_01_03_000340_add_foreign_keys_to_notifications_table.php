<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign(['type_fk'], 'notifications_notificationtype_id_fk')->references(['id'])->on('notificationtype')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['task_fk'], 'notifications_projecttasks_id_fk')->references(['id'])->on('projecttasks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['author_fk'], 'notifications_users_id_fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign('notifications_notificationtype_id_fk');
            $table->dropForeign('notifications_projecttasks_id_fk');
            $table->dropForeign('notifications_users_id_fk');
        });
    }
}
