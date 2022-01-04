<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBoardcolumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boardcolumns', function (Blueprint $table) {
            $table->foreign(['project_fk'], 'boardColumns_projects_id_fk')->references(['id'])->on('projects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['author_fk'], 'boardColumns_users_id_fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boardcolumns', function (Blueprint $table) {
            $table->dropForeign('boardColumns_projects_id_fk');
            $table->dropForeign('boardColumns_users_id_fk');
        });
    }
}
