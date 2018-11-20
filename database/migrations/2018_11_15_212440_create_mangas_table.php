<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMangasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('mangas', function (Blueprint $table) {
                $table->increments('manga_id')->unsigned();

                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('category_id')->on('categories');


                $table->integer('author_id')->unsigned();
                $table->foreign('author_id')->references('author_id')->on('authors');



                $table->integer('manga_chap_id')->unsigned();
                $table->foreign('manga_chap_id')->references('manga_chap_id')->on('chapters');

                $table->string('manga_name');
                $table->text('detail');
                $table->string('image')->nullable();
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
        Schema::dropIfExists('mangas');
    }
}
