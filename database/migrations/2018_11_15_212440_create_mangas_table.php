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
                $table->increments('id')->unsigned();

                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('category_id')->on('categories');


                $table->integer('author_id')->unsigned();
                $table->foreign('author_id')->references('author_id')->on('authors');



                $table->integer('chap_id')->unsigned();
//                $table->foreign('chap_id')->references('chap_id')->on('chapters');

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
