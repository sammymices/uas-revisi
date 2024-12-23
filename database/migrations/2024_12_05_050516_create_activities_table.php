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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('datetime');
            $table->text('description');
            $table->text('content');
            $table->text('photo')->nullable();
            $table->integer('cost');
            $table->enum('activity_type', ['internal', 'external']);
//            $table->foreignId('user_id')->constrained("users");
            $table->integer('total_child');
            $table->string('location');
            $table->string('organizer');
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
        Schema::dropIfExists('activities');
    }
};
