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
        Schema::create('councilors_polls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('law_project_id');

            $table->foreign('law_project_id')->references('id')->on('law_projects');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('councilors_polls');
    }
};
