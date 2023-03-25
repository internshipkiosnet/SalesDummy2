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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('sales_id');
            $table->string('area_id')->nullable();
            $table->string('name');
            $table->string('contact');
            $table->string('address')->nullable( );
            $table->enum('gender', ['male','female']);
            $table->enum('status', ['Q&A','Canceled','Uncover','Closing']);
            $table->enum('approach', ['offline','online']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('customers');
    }
};
