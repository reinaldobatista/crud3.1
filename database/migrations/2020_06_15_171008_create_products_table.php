<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name')->unique();
            $table->string('category_category');
            $table->foreign('category_category')->references('category')->on('category')->onDelete('cascade')->onUpadate('cascade');
            $table->double('price',10,2);
            $table->string('image')->nullable();
            $table->text('description');
            $table->timestamps();
            // $table->increments('id');
            // $table->integer('id_user')->unsigned();
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpadate('cascade');
            // $table->string('title');
            // $table->string('estoque');
            // $table->double('price',10,2);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
