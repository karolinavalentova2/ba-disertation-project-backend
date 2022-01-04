<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjecttasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projecttasks', function (Blueprint $table) {
            $table->foreign(['column_fk'], 'projectTasks_projects_id_fk')->references(['id'])->on('boardcolumns')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['parent_fk'], 'projectTasks_projectTasks_id_fk')->references(['id'])->on('projecttasks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['author_fk'], 'projectTasks_users_id_fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['assignee_fk'], 'projectTasks_users_id_fk_2')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projecttasks', function (Blueprint $table) {
            $table->dropForeign('projectTasks_projects_id_fk');
            $table->dropForeign('projectTasks_projectTasks_id_fk');
            $table->dropForeign('projectTasks_users_id_fk');
            $table->dropForeign('projectTasks_users_id_fk_2');
        });
    }
}
