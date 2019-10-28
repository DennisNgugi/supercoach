<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmortizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amortizations', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('loan_id')->unsigned();
          $table->string('instalment')->nullable();
          $table->string('payment_date')->nullable();
          $table->string('principal')->nullable();
          $table->string('interest')->nullable();
          $table->string('penalty')->nullable();
          $table->string('totals')->nullable();
          $table->string('paid_amount')->nullable();
          $table->string('loan_balance')->nullable();
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
        Schema::dropIfExists('amortizations');
    }
}
