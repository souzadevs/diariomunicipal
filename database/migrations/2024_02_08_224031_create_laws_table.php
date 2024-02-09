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
        Schema::create('laws', function (Blueprint $table) {
            $table->id();

            $table->longText('content');

            $table->string('registry_code')->nullable();
            $table->dateTime('registered_at')->nullable();
            $table->dateTime('published_at')->nullable();

            $table->unsignedBigInteger('law_status_id');
            $table->unsignedBigInteger('document_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('author_id');
            
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('document_id')->references('id')->on('users');
            $table->foreign('law_status_id')->references('id')->on('law_status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laws');
    }
};
