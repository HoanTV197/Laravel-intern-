<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author'); 
            $table->string('category'); 
            $table->date('release_date'); 
            $table->unsignedBigInteger('product_id');

            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
