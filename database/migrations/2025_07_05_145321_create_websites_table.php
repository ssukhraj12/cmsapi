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
        Schema::create('websites', function (Blueprint $collection) {
            $collection->id();
            $collection->string('siteid')->unique();
            $collection->string('site_name');
            $collection->string('site_url');
            $collection->string('site_title')->default('Home page Target');
            $collection->text('site_description')->default('Home page Description');
            $collection->json('social_links')->nullable();
            $collection->string('created_by')->nullable();
            $collection->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('websites');
    }
};
