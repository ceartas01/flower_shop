<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID заказа
            $table->string('order_number')->unique(); // Номер заказа (ORD-001)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с пользователем
            $table->decimal('total_amount', 10, 2); // Общая сумма
            $table->string('status')->default('pending'); // Статус: pending, confirmed, delivered, cancelled
            $table->text('shipping_address'); // Адрес доставки
            $table->string('customer_name'); // Имя клиента
            $table->string('customer_phone'); // Телефон
            $table->string('customer_email'); // Email
            $table->text('notes')->nullable(); // Примечания к заказу
            $table->timestamps(); // Даты
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};