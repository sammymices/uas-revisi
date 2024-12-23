<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->string('order_id')->primary();
            $table->integer('amount');
            $table->string('name');
            $table->date('date');
            $table->string('payment_type')->nullable();
            $table->string('bank')->nullable();
            $table->foreignId('user_id')->constrained("users");
            $table->string('status');
            $table->text('description');
            $table->enum('donation_type', ['uang', 'barang']);
            $table->text('photo');
            $table->foreignId('activity_id')->nullable()->constrained('activities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
