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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('image', 100);
            $table->decimal('price', 15, 2);  // Chỉnh sửa kiểu dữ liệu price và sale_price
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->tinyInteger('status')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

