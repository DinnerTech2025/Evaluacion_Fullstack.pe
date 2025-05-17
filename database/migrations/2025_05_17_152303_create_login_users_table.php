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
        //Creamos nuestras migraciones para la tabla login_users
        Schema::create('login_users', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 50)->unique();
            $table->string('userAgent', 250);
            //Indicamos que el campo user_id es una clave foranea
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_users');
    }
};
