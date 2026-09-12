<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('compare_at_price', 10, 2)->nullable();
            $table->boolean('in_stock')->default(true);
            $table->string('product_type')->nullable(); // e.g. Gi, Shorts, Rash Guard
            $table->json('sizes')->nullable(); // JSON array of sizes ["C0", "C1"]
            $table->json('colors')->nullable(); // JSON array of colors ["Black", "White"]
            $table->string('status')->default('Active');
            $table->timestamps();
        });
        
        // Insert mock data for filters
        DB::table('products')->insert([
            [
                'title' => 'Core Black Brazilian Jiu Jitsu Mens BJJ Gi', 
                'price' => 49.99, 'compare_at_price' => 68.81, 
                'in_stock' => true, 'product_type' => 'Mens Bjj Gis', 
                'sizes' => json_encode(['A1', 'A2', 'A3']), 'colors' => json_encode(['Black']),
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'title' => 'Core White Brazilian Jiu Jitsu Mens BJJ Gi', 
                'price' => 49.99, 'compare_at_price' => 68.81, 
                'in_stock' => false, 'product_type' => 'Mens Bjj Gis', 
                'sizes' => json_encode(['A1', 'A2', 'A3']), 'colors' => json_encode(['White']),
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'title' => 'Brazilian Jiu Jitsu Kids BJJ Gray/White Belt', 
                'price' => 7.99, 'compare_at_price' => 9.40, 
                'in_stock' => true, 'product_type' => 'Kids BJJ Belt', 
                'sizes' => json_encode(['C0', 'C1', 'C2', 'C3']), 'colors' => json_encode(['Gray', 'White']),
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
