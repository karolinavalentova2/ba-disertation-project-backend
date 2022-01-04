<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('author_fk')->index('notifications_users_id_fk');
            $table->bigInteger('type_fk')->index('notifications_notificationtype_id_fk');
            $table->bigInteger('task_fk')->index('notifications_projecttasks_id_fk');
            $table->tinyInteger('isRead');
            $table->timestamp('created');
        });
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
