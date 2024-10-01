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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique(); // Unique policy code
            $table->string('plan_reference', 191); // Plan reference
            $table->string('first_name', 191); // Policy holder's first name
            $table->string('last_name', 191); // Policy holder's last name
            $table->string('investment_house', 191); // Investment house name
            $table->date('last_operation'); // Date of the last operation
            $table->foreignId('staff_user_id')->nullable()->constrained('users')->onDelete('set null'); // Policy assigned to a staff user
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
