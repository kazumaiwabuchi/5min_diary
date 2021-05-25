<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridToDiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diaries', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();//user_idカラムのnull値を許容
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diaries_', function (Blueprint $table) {
            $table->dropForeign('tasks_user_id_foreign');//外部キー制約の削除
            $table->dropColumn('user_id');
        });
    }
}
