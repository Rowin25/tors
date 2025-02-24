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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->unsignedBigInteger('client_id');
            $table->decimal('payment_receive',10,2);
            $table->decimal('payment_change',10,2);

          
            $table->timestamps();
            
            $table->foreign('bill_id')->references('id')->on('billing')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('client_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
