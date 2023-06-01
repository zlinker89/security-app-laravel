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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('icon', 100);
            $table->string('url', 250);
            $table->enum('type', ['Module', 'Link', 'Link External'])->default('Module');
            $table->integer('position')->unique();
            $table->string('tenant_id');
            $table->foreignId('app_id')->references('id')->on('apps');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
