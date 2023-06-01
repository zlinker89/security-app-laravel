<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\User;
use Database\Factories\AppFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tenant\Tenant::all()->runForEach(function () {
            App::factory(10)->create();
            User::factory(10)->create();
        });
    }
}
