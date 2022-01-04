<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardcolumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardcolumns', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('project_fk')->index('boardColumns_projects_id_fk');
            $table->bigInteger('author_fk')->index('boardColumns_users_id_fk');
            $table->string('name', 100);
            $table->boolean('active');
            $table->timestamp('created');
            $table->integer('boardIndex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boardcolumns');
    }
}
