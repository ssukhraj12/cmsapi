<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use MongoDB\Laravel\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $collection) {
            $collection->string('email')->unique();
            $collection->string('password');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
