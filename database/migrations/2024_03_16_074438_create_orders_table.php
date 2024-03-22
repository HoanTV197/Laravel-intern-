<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->date('order_date');
            $table->decimal('total_price', 10, 2);
            $table->string('status');
            $table->date('purchase_date')->nullable();
            $table->string('purchase_place')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');

        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
