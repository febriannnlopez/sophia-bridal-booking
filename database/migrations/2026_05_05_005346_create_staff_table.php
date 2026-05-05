<?php

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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->enum('jabatan', [
                'photographer',
                'makeup_artist',
                'hair_stylist',
                'admin',
                'marketing',
                'dress_attendant'
            ]);
            $table->string('spesialisasi')->nullable(); // mis: "Wedding & Prewedding"
            $table->text('bio')->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
