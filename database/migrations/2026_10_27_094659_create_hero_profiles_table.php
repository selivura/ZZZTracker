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
        Schema::create('hero_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('hero_id');
            
            $table->string('profile_name', 100);
            $table->unsignedSmallInteger('promotion_level')->default(0);
            $table->unsignedInteger('current_exp')->default(0);
            $table->unsignedSmallInteger('current_level')->default(1);
            $table->unsignedTinyInteger('basic_attack_level')->default(1);
            $table->unsignedTinyInteger('dodge_level')->default(1);
            $table->unsignedTinyInteger('assist_level')->default(1);
            $table->unsignedTinyInteger('special_level')->default(1);
            $table->unsignedTinyInteger('chain_level')->default(1);
            $table->unsignedTinyInteger('core_level')->default(1);

            $table->index('user_id', 'idx_hero_profiles_user_id');
            $table->index('hero_id', 'idx_hero_profiles_hero_id');

            $table->foreign('user_id', 'fk_hero_profiles_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('hero_id', 'fk_hero_profiles_hero')
                ->references('id')
                ->on('heroes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_profiles');
    }
};
