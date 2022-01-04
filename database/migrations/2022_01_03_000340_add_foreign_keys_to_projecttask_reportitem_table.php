<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProjecttaskReportitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projecttask_reportitem', function (Blueprint $table) {
            $table->foreign(['project_fk'], 'projectTask_reportItem_projects_id_fk')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['task_fk'], 'projectTask_reportItem_projecttasks_id_fk')->references(['id'])->on('projecttasks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['author_fk'], 'projectTask_reportItem_users_id_fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projecttask_reportitem', function (Blueprint $table) {
            $table->dropForeign('projectTask_reportItem_projects_id_fk');
            $table->dropForeign('projectTask_reportItem_projecttasks_id_fk');
            $table->dropForeign('projectTask_reportItem_users_id_fk');
        });
    }
}
