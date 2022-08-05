<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username')->nullable()->after('name');
            $table->string('rollNumber')->nullable()->after('username');
            $table->bigInteger('cnic')->length(13)->after('rollNumber');
            $table->string('session')->nullable()->after('cnic');
            $table->string('dept')->nullable()->after('session');
            $table->string('userImage')->nullable()->after('dept');
            $table->string('section')->nullable()->after('userImage');
            $table->integer('semester')->nullable()->after('section')->default(1);
            $table->integer('status')->nullable()->after('semester')->comments('1 for active, 2 for in-active');







            

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
            //
        });
    }
}
