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
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('symbol_id');
            $table->dateTime('dateTime');
            $table->enum('transaction', ['BUY', 'SELL', 'HLI', 'HGU']);
            $table->integer('shares');
            $table->decimal('amount', 65, 4);
            $table->decimal('price', 9, 4)->nullable();
            $table->integer('totalShares')->nullable();
            $table->decimal('totalAmount', 65, 4)->nullable();
            $table->decimal('cost', 9, 4)->nullable();
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
