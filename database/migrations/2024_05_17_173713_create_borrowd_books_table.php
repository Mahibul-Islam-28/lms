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
        Schema::create('borrowd_books', function (Blueprint $table) {
            $table->increments('borrow_id');
            $table->integer('member_id');
            $table->integer('book_id');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowd_books');
    }
};
