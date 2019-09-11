<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_payments', function (Blueprint $table) {
          $table->increments('id');
        $table->integer('loan_id')->unsigned();
        $table->double('principle');
        $table->double('amount_paid');
        $table->double('interest');
        $table->double('amount_owing');
        $table->double('balance');

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
        Schema::dropIfExists('loan_payments');
    }
}
