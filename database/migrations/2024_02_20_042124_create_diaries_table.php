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
        Schema::create('diaries', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->string('edition');
            $table->string('published_at');
            $table->string('downloads')->default(0);
            $table->string('path_pdf')->nullable();

            $table->string('pdf_mb_size')->nullable();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diaries');
    }
};
