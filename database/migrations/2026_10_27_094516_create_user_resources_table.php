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
        Schema::create('user_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('resource_id');
            $table->unsignedBigInteger('quantity')->default(0);

            $table->unique(['user_id', 'resource_id'], 'uq_user_resources');
            $table->index('resource_id', 'idx_user_resources_resource_id');

            $table->foreign('user_id', 'fk_user_resources_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('resource_id', 'fk_user_resources_resource')
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
        Schema::dropIfExists('user_resources');
    }
};
