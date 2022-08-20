<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$2ww2jO8t8qPdpBu4fj/i8.ZPAx/2LMc9zpOEnFnDJYdZ2mi/5u99S' // 12345678
        ]);
    }
}
