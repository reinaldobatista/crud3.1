<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('story_story');
            $table->foreign('story_story')->references('story')->on('story')->onDelete('cascade')->onUpadate('cascade');
            $table->string('products_name');
            $table->foreign('products_name')->references('name')->on('products')->onDelete('cascade')->onUpadate('cascade');
            $table->double('qtd',10,2);
            $table->string('category_category');
            $table->foreign('category_category')->references('category')->on('category')->onDelete('cascade')->onUpadate('cascade');
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
        Schema::dropIfExists('deposito');
    }
}
