<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID категории (автоинкремент)
            $table->string('name'); // Название категории (например, "Розы")
            $table->string('slug')->unique(); // ЧПУ (например, "rozy")
            $table->text('description')->nullable(); // Описание категории
            $table->timestamps(); // created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};