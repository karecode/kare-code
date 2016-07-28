<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserResimleriSil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('orta_resim');
            $table->dropColumn('buyuk_resim');
            $table->dropColumn('kucuk_resim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('orta_resim');
            $table->string('buyuk_resim');
            $table->string('kucuk_resim');
        });
    }
}
