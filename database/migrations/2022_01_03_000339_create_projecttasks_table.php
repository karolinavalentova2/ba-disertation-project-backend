<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjecttasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecttasks', function (Blueprint $table) {
            $table->bigInteger('id', true)->unique('projectTasks_id_uindex');
            $table->bigInteger('column_fk')->nullable()->index('projectTasks_projects_id_fk');
            $table->bigInteger('parent_fk')->nullable()->index('projectTasks_projectTasks_id_fk');
            $table->bigInteger('author_fk')->index('projectTasks_users_id_fk');
            $table->bigInteger('assignee_fk')->nullable()->index('projectTasks_users_id_fk_2');
            $table->string('name', 100);
            $table->timestamp('created');
            $table->timestamp('dueDate')->nullable();
            $table->string('description');
            $table->boolean('active');
            $table->integer('timeTracked')->nullable();
            $table->boolean('completed');
            $table->timestamp('modified');
            $table->integer('columnIndex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projecttasks');
    }
}
