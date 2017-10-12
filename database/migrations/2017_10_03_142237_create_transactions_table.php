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
            $table->decimal('price', 9, 4);
            $table->integer('total');
            $table->decimal('sum', 65, 4);
            $table->decimal('cost', 9, 4);
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
