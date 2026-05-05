<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            if (!Schema::hasColumn('carts', 'qty')) {
                $table->integer('qty')->default(1)->after('product_id');
            }
            
            if (!Schema::hasColumn('carts', 'price_at_time')) {
                $table->decimal('price_at_time', 12, 2)->nullable()->after('qty');
            }
        });
    }

    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn(['qty', 'price_at_time']);
        });
    }
};