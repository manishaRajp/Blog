<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->string('website');
            $table->string('link_1');
            $table->string('link_2');
            $table->string('link_3');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
