<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->foreignId('country_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->foreignId('city_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->char('sex', 1); // M or F
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('religion_id')->nullable()->constrained()->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
