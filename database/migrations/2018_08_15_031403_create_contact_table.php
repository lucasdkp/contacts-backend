<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mail');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('token');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contacts');
    }
}
