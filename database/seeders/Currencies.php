<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class Currencies extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::updateOrCreate([
            'name' => 'United States Dollar',
            'code' => 'USD',
            'symbol' => '$',
        ]);

        Currency::updateOrCreate([
            'name' => 'Euro',
            'code' => 'EUR',
            'symbol' => '€',
        ]);

        Currency::updateOrCreate([
            'name' => 'British Pound',
            'code' => 'GBP',
            'symbol' => '£',
        ]);
    }
}
