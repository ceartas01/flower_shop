<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID товара
            $table->string('name'); // Название товара
            $table->string('slug')->unique(); // ЧПУ
            $table->text('description')->nullable(); // Описание
            $table->decimal('price', 8, 2); // Цена (999999.99)
            $table->integer('stock')->default(0); // Количество на складе
            $table->string('image')->nullable(); // Путь к изображению
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Связь с категорией
            $table->boolean('is_active')->default(true); // Активен ли товар
            $table->timestamps(); // Даты создания и обновления
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};