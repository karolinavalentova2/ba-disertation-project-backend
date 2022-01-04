<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjecttasksContributorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projecttasks_contributors', function (Blueprint $table) {
            $table->bigInteger('id', true)->unique('projectTasks_contributors_id_uindex');
            $table->bigInteger('userId')->index('projectTasks_contributors_users_id_fk');
            $table->bigInteger('projectTaskId')->index('projectTasks_contributors_projecttasks_id_fk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projecttasks_contributors');
    }
}
