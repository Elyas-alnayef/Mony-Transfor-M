<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t__archives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->foreign('sender_id')->references('id')->on ('points')->onDelete('cascade');
            $table->unsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on ('points')->onDelete('cascade');
            $table->integer('total_amount');
            $table->integer('un_number');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t__archives');
    }
};
