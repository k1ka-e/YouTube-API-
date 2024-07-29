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
        Schema::create('category_video', function (Blueprint $table) {
            $table->primary(['category_id', 'video_id']);
            $table->foreignIdFor(\App\Models\Category::class)->constrained();
            $table->foreignIdFor(\App\Models\Video::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_video');
    }
};
