<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->text('description');
            $table->string('image');
            $table->string('statut');
            $table->integer('capacite');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('categorie_id')->constrained('categorie');
            $table->foreignId('tag_id')->constrained('tag');
            $table->foreignId('propriete_id')->constrained('propriete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chambres');
    }
};
