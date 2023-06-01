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
        Schema::create('menu_options', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('icon', 100);
            $table->string('url', 250);
            $table->enum('type', ['Link', 'Link External'])->default('Link');
            $table->integer('position');
            $table->string('tenant_id');
            $table->foreignId('module_id')->references('id')->on('modules');
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
        Schema::dropIfExists('menu_options');
    }
};
