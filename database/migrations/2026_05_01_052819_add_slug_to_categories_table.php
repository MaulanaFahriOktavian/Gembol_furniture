<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Cek apakah kolom 'slug' sudah ada sebelum menambahkannya
            if (!Schema::hasColumn('categories', 'slug')) {
                $table->string('slug')->nullable(); 
                // Kita hapus ->after('name') agar tidak error jika kolom name tidak ada
            }

            if (!Schema::hasColumn('categories', 'description')) {
                $table->text('description')->nullable();
            }

            if (!Schema::hasColumn('categories', 'image')) {
                $table->string('image')->nullable();
            }

            if (!Schema::hasColumn('categories', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['slug', 'description', 'image', 'is_active']);
        });
    }
};