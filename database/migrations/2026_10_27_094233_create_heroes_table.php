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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedTinyInteger('rarity');
            $table->unsignedTinyInteger('element');
            $table->unsignedTinyInteger('specialty');
            $table->foreignId('core_skill_resource_A_id');
            $table->foreignId('core_skill_resource_S_id');

            $table->foreign('core_skill_resource_A_id', 'heroes_resources_FK')
                ->references('id')
                ->on('resources')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('core_skill_resource_S_id', 'heroes_resources_FK_1')
                ->references('id')
                ->on('resources')
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
        Schema::dropIfExists('heroes');
    }
};
