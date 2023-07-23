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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('publisher');
            $table->unsignedBigInteger('price');
            $table->string('edition');
            $table->string('publication_year');
            $table->string('book_file');
            $table->string('demo_file');
            $table->string('image');
            $table->float('score')->default(-1);
            $table->text('caption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
