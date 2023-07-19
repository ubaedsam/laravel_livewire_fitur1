<?php

namespace Database\Seeders;

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
        // Membuat 10 data user sembarang
        \App\Models\User::factory(10)->create();

        // Membuat 10 data student sembarang
        \App\Models\Student::factory(10)->create();
    }
}
