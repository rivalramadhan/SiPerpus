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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->nullable(false)->unique('admin_username_unique');
            $table->string('password', 100)->nullable(false);
            $table->string('fullname', 100)->nullable(false);
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
