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
        Schema::table('products', function (Blueprint $table) {
            $table->string('color')->nullable();
            $table->string('finish')->nullable();
            $table->string('style')->nullable();
            $table->string('thickness')->nullable();
            $table->string('size')->nullable();
            $table->string('series')->nullable();
            $table->string('title')->nullable();
            $table->text('keywords')->nullable();
            $table->text('meta_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'color',
                'finish',
                'style',
                'thickness',
                'size',
                'series',
                'title',
                'keywords',
                'meta_description'
            ]);
        });
    }
};
