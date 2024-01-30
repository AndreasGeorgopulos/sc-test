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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('other_id')->nullable();
            $table->string('tax_number', 10)->unique();
            $table->string('full_name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('login_at', 0)->nullable();
            $table->timestamp('logout_at', 0)->nullable();
            $table->timestamps();

            $table->index('other_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
