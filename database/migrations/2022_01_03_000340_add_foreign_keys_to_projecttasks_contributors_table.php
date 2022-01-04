<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjecttasksContributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projecttasks_contributors', function (Blueprint $table) {
            $table->foreign(['projectTaskId'], 'projectTasks_contributors_projecttasks_id_fk')->references(['id'])->on('projecttasks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['userId'], 'projectTasks_contributors_users_id_fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projecttasks_contributors', function (Blueprint $table) {
            $table->dropForeign('projectTasks_contributors_projecttasks_id_fk');
            $table->dropForeign('projectTasks_contributors_users_id_fk');
        });
    }
}
