<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('roles', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('name');  // admin , moderator , websmaster  buyers
//            $table->softDeletes();
//            $table->timestamps();
//        });
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); //this will be the short handed key for role: admin etc.
            $table->string('label')->nullable(); //this will be the display like: Admin, etc.
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // name is where you can create: users.delete
            $table->string('label')->nullable(); //label is the visual: Delete users
            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * This table will hold permission for particular role
         */
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->primary(['permission_Id', 'role_id']);
        });

        /**
         * This table will hold the roles for users and role id
         * you can assign more than one role for each user now
         */
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->primary(['role_id', 'user_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles');
    }
}
