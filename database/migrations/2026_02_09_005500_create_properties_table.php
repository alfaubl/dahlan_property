<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_code')->unique();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['house', 'apartment', 'land', 'commercial', 'villa']);
            $table->text('description');
            $table->text('address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code')->nullable();
            $table->decimal('price', 15, 2);
            $table->decimal('area', 10, 2)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('garages')->nullable();
            $table->integer('year_built')->nullable();
            $table->json('amenities')->nullable();
            $table->json('images')->nullable();
            $table->enum('status', ['available', 'sold', 'rented', 'pending']);
            $table->enum('purpose', ['sale', 'rent', 'both']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('featured')->default(false);
            $table->integer('views')->default(0);
            $table->softDeletes();
            $table->timestamps();
            
            // Indexes
            $table->index(['type', 'status']);
            $table->index(['city', 'province']);
            $table->index(['price', 'status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
};