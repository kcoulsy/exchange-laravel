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

        Currency::updateOrCreate([
            'name' => 'Japanese Yen',
            'code' => 'JPY',
            'symbol' => '¥',
        ]);

        Currency::updateOrCreate([
            'name' => 'Canadian Dollar',
            'code' => 'CAD',
            'symbol' => 'CA$',
        ]);

        Currency::updateOrCreate([
            'name' => 'Australian Dollar',
            'code' => 'AUD',
            'symbol' => 'AUD$',
        ]);

    }
}
