<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TodoTable extends Migration
{
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->Increments('id_todo');
            $table->string('nama_todo');
            $table->enum('status', ['menunggu', 'sudah', 'belum']);
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
        Schema::dropIfExists('todo');
    }
}
