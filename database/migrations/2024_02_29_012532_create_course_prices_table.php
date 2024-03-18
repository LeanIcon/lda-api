<?php

use App\Models\Course;
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
        Schema::create('course_prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 8, 2);
            $table->string('currency', 3)->nullable();
            $table->text('description')->nullable();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->timestamps();


            // $table->decimal('early_bird_price', 4, 2)->nullable();
            // $table->date('early_bird_start_date')->nullable();
            // $table->date('early_bird_end_date')->nullable();
            // $table->string('currency', 3)->nullable();
            // $table->integer('discount')->default(0 - 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_prices');
    }
};
