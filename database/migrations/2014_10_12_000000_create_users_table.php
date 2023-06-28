<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable()->comment('{ "hidden" : true }');
            $table->string('password')->comment('{ "index.hidden" : true, "encrypted" : true }');
            $table->rememberToken()->comment('{ "hidden" : true }');
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                "name" => "Gean B2B",
                "email" => "gean@b2balmoxarifado.com.b",
                "password" => Hash::make("12345"),
                "email_verified_at" => now(),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Luiz Eduardo",
                "email" => "l.eduardosoares@gmail.com",
                "password" => Hash::make("ASDqwe123@"),
                "email_verified_at" => now(),
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
