<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogTablosuOlustur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baslik');
            $table->string('icerik');
            $table->integer('user_id');
            $table->string('kucuk_resim');
            $table->string('orta_resim');
            $table->string('buyuk_resim');
            $table->string('slug')->index();
            $table->softDeletes();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blogs');
    }
}
