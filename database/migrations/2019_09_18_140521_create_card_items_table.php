<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('order');
            $table->text('description');
            $table->string('image');
            $table->string('btn_code')->nullable();
            $table->string('btn_demo')->nullable();
            $table->json('technologies')->nullable();
            $table->unsignedBigInteger('card_list_id');
            $table->timestamps();

            $table->foreign('card_list_id')->references('id')->on('card_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_items');
    }
}
