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
        Schema::create('rentbook', function (Blueprint $table) {
            $table->id();
            $table->string('book_title', 100)->nullable(false);
            $table->string('fullname',100)->nullable(false);
            $table->date('rent_date',100)->nullable(false);
            $table->date('return_date',100)->nullable(false);
            $table->string('status',100)->nullable(false)->default('Di pinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rentbook', function (Blueprint $table) {
            //
        });
    }
};
