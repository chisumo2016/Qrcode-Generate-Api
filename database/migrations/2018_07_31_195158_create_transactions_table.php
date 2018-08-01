<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); //User making transaction
            $table->integer('qrcode_id');
            $table->integer('qrcode_owner_id')->nullable();  // track the qrcode
            $table->string('payment_method')->nullable();//paypal ,stripe ,paystack
            $table->longText('message')->nullable();  //msg comes from website
            $table->float('amount',10,4);
            $table->string('status')->default('initiated'); // Initiated, completed and payment failed
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
        Schema::dropIfExists('transactions');
    }
}
