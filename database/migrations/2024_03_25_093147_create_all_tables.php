<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->string('Username', 255);
            $table->string('Password', 255);
            $table->string('Email', 255);
            $table->dateTime('DateCreated');
        });

        Schema::create('Roles', function (Blueprint $table) {
            $table->id();
            $table->string('RoleName', 255);
            $table->string('Description', 255);
        });

        Schema::create('UserRoles', function (Blueprint $table) {
            $table->unsignedBigInteger('UserId');
            $table->unsignedBigInteger('RoleId');
            $table->primary(['UserId', 'RoleId']);
            $table->foreign('UserId')->references('id')->on('Users');
            $table->foreign('RoleId')->references('id')->on('Roles');
        });

        Schema::create('Projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserId');
            $table->string('ProjectName', 255);
            $table->string('Status', 255);
            $table->string('ProjectOwner', 255);
            $table->string('Faculty', 255);
            $table->string('ResearchArea', 255);
            $table->string('ResearchLine', 255);
            $table->integer('NumMembers');
            $table->string('Description', 255);
            $table->foreign('UserId')->references('id')->on('Users');
        });

        Schema::create('Forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ProjectId');
            $table->string('MicrosoftFormLink', 255);
            $table->foreign('ProjectId')->references('id')->on('Projects');
        });

        Schema::create('Requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ProjectId');
            $table->unsignedBigInteger('UserId');
            $table->string('RequestStatus', 255);
            $table->foreign('ProjectId')->references('id')->on('Projects');
            $table->foreign('UserId')->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Requests');
        Schema::dropIfExists('Forms');
        Schema::dropIfExists('Projects');
        Schema::dropIfExists('UserRoles');
        Schema::dropIfExists('Roles');
        Schema::dropIfExists('Users');
    }
};
