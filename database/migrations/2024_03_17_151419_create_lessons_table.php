<?php

use App\Models\Topic;
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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable(); // Can be used for future text-based lessons
            $table->string('video_url')->nullable();
            $table->string('document_url')->nullable();
            $table->foreignIdFor(Topic::class, 'topic_id');
            $table->timestamps();

            $table->index('topic_id'); // Add index for performance
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
