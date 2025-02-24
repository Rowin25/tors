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
        Schema::create('billing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('reading_id');
            $table->decimal('totalAmount',10,2);
            $table->decimal('balance',10,2);
            $table->enum('status',['paid','unpaid']);
            $table->date('due_date');

            $table->timestamps();
            
            $table->foreign('client_id')->references('id')->on('client_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reading_id')->references('id')->on('meter_readings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing');
    }
};
