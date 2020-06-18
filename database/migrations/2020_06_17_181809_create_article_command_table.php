<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCommandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_command', function (Blueprint $table) {
            $table->bigIncrements('id');
            //retirer le nullable
            $table->integer("total_order")->nullable();
            $table->timestamps();

            $table->bigInteger('command_id')->unsigned();
            $table->foreign('command_id')->references('id')->on('commands');
            $table->bigInteger('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_command');
    }
}
