<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Address;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Contact::factory(5000)
            ->has(Phone::factory()->count(2))
            ->has(Email::factory()->count(2))
            ->has(Address::factory()->count(2))
            ->create();
    }
}
