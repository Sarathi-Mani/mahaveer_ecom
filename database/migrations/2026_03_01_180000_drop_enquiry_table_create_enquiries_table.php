<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
 
             Schema::create('enquiries', function (Blueprint $table) {
                $table->id();
                $table->string('firstname', 120);
                $table->string('email', 150);
                $table->string('phoneno', 30);
                $table->text('message');
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
            });
         }

    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};

