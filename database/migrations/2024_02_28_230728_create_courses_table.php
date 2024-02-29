<?php

use App\Models\CoursePrice;
use App\Models\CourseTopic;
use App\Models\Faq;
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
            $table->text('summary');
            $table->longText('description');
            $table->string('duration')->nullable();
            $table->string('banner')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('badge')->nullable();
            $table->string('slug')->unique();
            $table->date('start_date')->nullable();
            $table->foreignIdFor(User::class, 'trainer_id')->nullable();
            $table->foreignIdFor(CourseTopic::class, 'topic_id')->nullable();
            $table->foreignIdFor(CoursePrice::class, 'price_id')->nullable();
            $table->foreignIdFor(Faq::class, 'faq_id')->nullable();
            $table->string('brochure_url')->nullable();
            $table->string('syllabus_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('course_type')->nullable();
            $table->string('course_tag')->nullable();
            $table->string('capture_type')->nullable();
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
