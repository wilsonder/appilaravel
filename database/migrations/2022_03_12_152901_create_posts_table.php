<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');            
            $table->timestamps();
            
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Categorias_id')->references('id')->on('categorias')->comment('id de la categoria');
            $table->string('titulo');
            $table->text('contenido');
            $table->timestamps();
            
        });

        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Posts_id')->references('id')->on('posts')->comment('id del post');
            $table->string('contenido');
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('comentarios');
    }
}
