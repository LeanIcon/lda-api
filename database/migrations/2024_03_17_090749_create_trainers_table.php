<?php

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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('expertise')->nullable();
            $table->text('phone')->nullable();
            $table->text('bio')->nullable();
            $table->text('social_url')->nullable();
            // $table->foreignIdFor(User::class, 'user_id')->nullable(); // User ID (nullable)
            // $table->boolean('has_assigned_user')->default(false)->nullable(); // Flag for assigned user
            $table->softDeletes(); // Soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
