<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('chapters', function (Blueprint $table) {
                $table->increments('manga_chap_id')->unsigned();
                $table->integer('chap_id')->unsigned();
                $table->string('chap_name');
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
        Schema::dropIfExists('chapters');


    }
}
