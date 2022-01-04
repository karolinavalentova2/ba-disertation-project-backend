<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigInteger('id', true)->unique('projects_id_uindex');
            $table->bigInteger('team_fk')->index('projects_teams_id_fk');
            $table->bigInteger('author_fk')->index('projects_users_id_fk');
            $table->timestamp('created');
            $table->boolean('active');
            $table->string('name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
