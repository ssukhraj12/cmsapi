<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $collection) {
            $collection->id(); // MongoDB ObjectId
            $collection->string('title');
            $collection->string('slug')->unique();
            $collection->string('image_url')->nullable();
            $collection->string('short_content')->nullable();
            $collection->text('blog_content')->nullable();
            $collection->json('tags')->nullable();
            $collection->string('category')->nullable();
            $collection->boolean('published')->default(false);
            $collection->string('created_by')->nullable(); // could be admin_id
            $collection->string('siteid')->nullable(); // could be siteid
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
