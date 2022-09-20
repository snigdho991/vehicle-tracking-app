<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertSomeFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cover_photo')->nullable();
            $table->string('hometown')->nullable();
            $table->string('skills')->nullable();
            $table->string('social_links')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cover_photo');
            $table->dropColumn('hometown');
            $table->dropColumn('skills');
            $table->dropColumn('social_links')->nullable();

        });
    }
}
