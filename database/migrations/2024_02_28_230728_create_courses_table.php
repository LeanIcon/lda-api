<?php

use App\Models\Category;
use App\Models\User;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->string('abbreviation')->nullable();
            $table->text('summary');
            $table->longText('description');
            $table->boolean('featured')->default('true')->nullable();
            $table->string('level', ['beginner', 'intermediate', 'advanced'])->default('beginner')->nullable(); // Enum for level
            $table->string('status')->default('enabled');
            $table->string('duration')->nullable();
            $table->string('banner')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('badge')->nullable();
            $table->string('brochure')->nullable();
            $table->string('delivery_mode')->nullable();
            $table->string('tag')->nullable();
            $table->string('cert_sample')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // Foreign key for Category model
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
