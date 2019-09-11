<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->integer('number');
          $table->string('email');
          $table->integer('mobile');
          $table->integer('national_id');
          $table->string('image')->nullable();
          $table->date('registration_date');
          $table->string('status')->default('Active');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
