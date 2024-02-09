<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->id();

            $table->string('title');
            $table->string('subtitle')->nullable();
            
            $table->dateTime('published_at');
            
            $table->longText('content');
            
            $table->boolean('active')->default(true);
            
            $table->unsignedBigInteger('document_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('author_id');
            
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('document_id')->references('id')->on('users');
            
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
