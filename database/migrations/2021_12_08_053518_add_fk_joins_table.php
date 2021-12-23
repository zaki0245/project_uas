<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('joins', function(Blueprint $table){
            $table->dropColumn('actifity_name');
            $table->dropColumn('name');
            $table->unsignedBigInteger('actifity_id')->nullable()->after('id');
            $table->unsignedBigInteger('name_id')->nullable()->after('id');
            $table->foreign('actifity_id')->references('id')->on('actifities');
            $table->foreign('name')->references('id')->on('members');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('joins', function(Blueprint $table){
            $table->string('actifity_name');
            $table->string('name');
            $table->dropForeign(['actifity_id']);
            $table->dropForeign(['name_id']);
            });
    }
}
