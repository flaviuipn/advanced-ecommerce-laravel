<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('shipping_name');
            $table->string('shipping_city');
            $table->string('shipping_country');
            $table->string('shipping_judet');
            $table->string('shipping_address');
            $table->text('notes')->nullable();
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->integer('post_code');
            $table->string('payment_method');
            $table->string('transaction_id');
            $table->float('amount', 8, 2);
            $table->string('currency');
            $table->string('order_number');
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
        Schema::dropIfExists('orders');
    }
}
