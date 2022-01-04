<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign(['task_fk'], 'comments_projecttasks_id_fk')->references(['id'])->on('projecttasks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['author_fk'], 'comments_users_id_fk')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_projecttasks_id_fk');
            $table->dropForeign('comments_users_id_fk');
        });
    }
}
