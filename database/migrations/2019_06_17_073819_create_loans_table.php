<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
          $table->increments('id');
          $table->string('loan_id');
        $table->integer('member_id')->unsigned();
        $table->integer('vehicle_id')->unsigned();
        $table->date('date');
        $table->double('amount');
        $table->double('interest_rate');
        $table->integer('duration');
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
        Schema::dropIfExists('loans');
    }
}
