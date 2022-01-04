<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjecttaskReportitemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecttask_reportitem', function (Blueprint $table) {
            $table->bigInteger('id', true)->unique('projectTask_reportItem_id_uindex');
            $table->bigInteger('project_fk')->index('projectTask_reportItem_projects_id_fk');
            $table->bigInteger('task_fk')->index('projectTask_reportItem_projecttasks_id_fk');
            $table->bigInteger('author_fk')->index('projectTask_reportItem_users_id_fk');
            $table->integer('quantity')->nullable();
            $table->integer('unitPrice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projecttask_reportitem');
    }
}
